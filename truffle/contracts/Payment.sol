pragma solidity >=0.4.21 <0.6.0;

contract Payment{

    struct Exchange{   
        address renter;
        address tenant;
    }

    Exchange wallets;

    mapping(uint256 => bool) usedNonces;

    constructor () public payable {}

    function claimPayment(uint amount, uint nonce, bytes memory signature) public
    {
        require(!usedNonces[nonce]);
        usedNonces[nonce] = true;

        bytes32 message = prefixed(keccak256(abi.encodePacked(msg.sender, amount, nonce, this)));

        require(recoverSigner(message, signature) == wallets.renter);

        msg.sender.transfer(amount);
    }

    function kill() public
    {
        require(msg.sender == wallets.renter);
        selfdestruct(msg.sender);
    }

    //Método de assinatura
    function splitSignature(bytes memory sig) internal pure 
        returns (uint8 v, bytes32 r, bytes32 s)
    {
        require(sig.length == 65);

        assembly {
            //Primeiros 32 bytes depois do prefix
            r := mload(add(sig, 32))
            //Segundos 32 bytes
            s := mload(add(sig, 64))
            //Último byte (primeiro byte depois dos últimos 32 bytes)
            v := byte(0, mload(add(sig, 96)))
        }
        return (v, r, s);
    }

    function recoverSigner(bytes32 message, bytes memory sig) internal pure 
        returns(address)
    {
        (uint8 v, bytes32 r, bytes32 s) = splitSignature(sig);

        return ecrecover(message, v, r, s);
    }

    //Cria uma hash prefixada para trataro comportamento de eth_sign.
    function prefixed(bytes32 hash) internal pure returns (bytes32) {
        return keccak256(abi.encodePacked("\x19Ethereum Signed Message:\n32", hash));
    }

}