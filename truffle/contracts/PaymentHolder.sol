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

    }

    Payment[] payments;
    address payable owner;
    uint256 ownerBalance;
    uint256[] confirmedPayments;

    function insertPaymentIntention
        (uint256 paymentId, uint256 price, uint userId, string memory paymentToken, address payable user_wallet)
        public returns (uint paymentIndex)
    {
        Payment memory p;
        p.paymentId = paymentId;
        p.price = price;
        p.userId = userId;
        p.paymentToken = paymentToken;
        p.confirmed = false;
        p.user_wallet = user_wallet;
        p.gasUsed = tx.gasprice;
        return (payments.push(p) - 1);
    }

    function () external payable {
        pay();
    }

    function pay() public payable
    {
        uint idx;
        bool found;

        (found, idx) = searchPayment(msg.sender, msg.value);

        if(!found){
            msg.sender.transfer(amountToReturn(msg.value));
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

    function searchPayment(address addr, uint256 price) private view
        returns (bool found, uint idx)
    {
        uint i = payments.length - 1;

        for(i; i >= 0; i -= 1){
            if(payments[i].user_wallet == addr && payments[i].price == price){
                return (true, i);
            }
        }
        return (false, 0);
    }

    function amountToReturn(uint256 amount) private view
        returns (uint256 returnable)
    {
        uint256 realValue;
        realValue = amount-tx.gasprice;

        return (realValue);
    }


}