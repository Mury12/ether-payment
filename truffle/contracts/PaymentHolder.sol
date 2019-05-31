pragma solidity >=0.4.21 <0.6.0;

contract PaymentHolder{


    struct Payment {
        address payable user_wallet;
        uint256 price;
        uint256 gasUsed;
        string  timestamp;
    }

    Payment[] payments;
    address payable owner;
    Payment[] confirmedPayments;


    constructor () public
    {
        owner = msg.sender;
    }

    function insertPaymentIntention
        (uint256 price, address payable user_wallet)
        public
    {
        bool found;
        uint idx;
        uint value;
        (found, idx, value) = searchPayment(user_wallet);


        Payment memory p;
        p.price = price;
        p.user_wallet = user_wallet;
        p.gasUsed = tx.gasprice;

        if(found){
            payments[idx] = p;
        }else{
            payments.push(p);
        }

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
        uint value;
        bool found;

        (found, idx, value) = searchPayment(msg.sender);

        if(!found || msg.value < value){
            uint256 amountToReturn = amountToReturn(msg.value);
            msg.sender.transfer(amountToReturn);
            return;
        }

            confirmedPayments.push(payments[idx]);
            removePaidPayment(idx);
        return;
    }

    function getPayments(uint status) public view
        returns (address[] memory, uint256[] memory)
    {
        address[] memory addr = new address[](payments.length);
        uint[] memory prices = new uint[](payments.length);
        //1 open
        if(status == 1){
            for(uint i = 0; i < payments.length; i++){
                addr[i] = payments[i].user_wallet;
                prices[i] = payments[i].price;
            }
        //2 confirmed
        }else if(status == 2){
            for(uint i = 0; i < payments.length; i++){
                addr[i] = confirmedPayments[i].user_wallet;
                prices[i] = confirmedPayments[i].price;
            }
        }
        return (addr, prices);
    }

    function searchPayment(address addr) public view
        returns (bool found, uint idx, uint value)
    {
        if(payments.length < 1) return (false, 0, 0);

        uint i = payments.length - 1;

        while(i>=0){
            if((payments[i].user_wallet == addr)){
                return (true, i, payments[i].price*(10**18));
            }
            i--;
        }
        return (false, 0, 0);
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

    function flushBalance() public payable
    {
        owner.transfer(address(this).balance);
    }

    function removePaidPayment(uint idx) private
    {
        if(idx < payments.length && idx != payments.length - 1){
            payments[idx] = payments[payments.length - 1];
            delete payments[payments.length - 1];
        }else{
            delete payments[idx];
        }
        payments.length--;
    }

}