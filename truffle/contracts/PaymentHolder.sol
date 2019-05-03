pragma solidity >=0.4.21 <0.6.0;

contract PaymentHolder{

    struct Payment {
        address addr;
        uint256 amount;
    }

    Payment[] payments;

    constructor () public {
    }

    function () external payable {
        pay();
    }

    function pay() payable public 
        returns (uint tax, uint paymentIdx)
    {
        Payment memory p;
        p.addr = msg.sender;
        p.amount = msg.value;

        uint idx = pushPayment(p) - 1;

        return (tx.gasprice, idx);

    }    

    function pushPayment(Payment memory p) private returns (uint idx)
    {
        return payments.push(p);
    }

    function getPayments() public view 
        returns (address[] memory, uint256[] memory)
    {
        address[] memory addr = new address[](payments.length);
        uint[] memory amounts = new uint[](payments.length);

        for(uint i = 0; i < payments.length; i++){
            addr[i] = payments[i].addr;
            amounts[i] = payments[i].amount;
        }

        return (addr, amounts);
    }
}