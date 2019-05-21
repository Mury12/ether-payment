pragma solidity >=0.4.21 <0.6.0;

contract PaymentHolder{


    struct Payment {
        address payable user_wallet;
        uint256 paymentId;
        uint256 price;
        uint256 gasUsed;
        uint256 userId;
        string  paymentToken;
        string  timestamp;
        bool    confirmed;
        bool    canceled;
    }

    Payment[] payments;
    address payable owner;
    bytes32 private passphrase;
    uint256[] confirmedPayments;


    constructor (string memory passwd) public
    {
        bytes memory _passwd = bytes(passwd);
        owner = msg.sender;
        passphrase = sha256(_passwd);
    }

    function insertPaymentIntention
        (uint256 paymentId, uint256 price, uint userId, string memory paymentToken, address payable user_wallet)
        public
    {
        bool found;
        uint idx;
        (found, idx) = searchPayment(user_wallet);
        if(found && !payments[idx].confirmed) payments[idx].canceled = true;

        Payment memory p;
        p.paymentId = paymentId;
        p.price = price;
        p.userId = userId;
        p.paymentToken = paymentToken;
        p.confirmed = false;
        p.canceled = false;
        p.user_wallet = user_wallet;
        p.gasUsed = tx.gasprice;

        payments.push(p);

    }

    function () external payable {
        if (msg.sender == owner){
            flushBalance();
        }else{
            pay();
        }
    }

    function pay() public payable
    {
        uint idx;
        bool found;

        (found, idx) = searchPayment(msg.sender);

        if(!found || (found && (payments[idx].confirmed || payments[idx].canceled))){
            uint256 amountToReturn = amountToReturn(msg.value);
            msg.sender.transfer(amountToReturn);
            return;
        }
        payments[idx].confirmed = true;
        confirmedPayments.push(idx);

    }

    function getPayments() public view
        returns (address[] memory, uint256[] memory)
    {
        address[] memory addr = new address[](payments.length);
        uint[] memory prices = new uint[](payments.length);

        for(uint i = 0; i < payments.length; i++){
            addr[i] = payments[i].user_wallet;
            prices[i] = payments[i].price;
        }
        return (addr, prices);
    }

    function searchPayment(address addr) public view
        returns (bool found, uint idx)
    {
        if(payments.length < 1) return (false, 0);

        uint i = payments.length - 1;

        while(i>=0){
            if((payments[i].user_wallet == addr)){
                return (true, i);
            }
            i--;
        }
        return (false, 0);
    }

    function amountToReturn(uint256 amount) private view
        returns (uint256 returnable)
    {
        uint256 realValue;
        realValue = amount-tx.gasprice*2;

        return (realValue);
    }

    function getContractBalance() public view
        returns (uint256 contractBalance)
    {
        return address(this).balance;
    }

    function retrievePayment(string calldata passwd, uint256 amount) external payable
        returns (bool res)
    {
        bytes memory _passwd = bytes(passwd);
        if(sha256(_passwd) == passphrase && msg.sender == owner){
            if(address(this).balance >= amount){
                owner.transfer(amount);
                return true;
            }
        }
        return false;
    }

    function flushBalance() public payable
    {
        owner.transfer(address(this).balance);
    }

}