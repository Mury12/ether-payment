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
    bytes32 passphrase;
    uint256 balance;
    uint256[] confirmedPayments;


    constructor (string memory passwd) public
    {
        bytes memory _passwd = bytes(passwd);
        balance = 0;
        owner = msg.sender;
        passphrase = sha256(_passwd);
    }

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

        balance -= tx.gasprice;

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
            uint256 amountToReturn = amountToReturn(msg.value);
            msg.sender.transfer(amountToReturn);
            balance -= amountToReturn;
            return;
        }
        payments[idx].confirmed = true;
        confirmedPayments.push(idx);

        balance += payments[idx].price;
    }

    function getPayments() public
        returns (address[] memory, uint256[] memory)
    {
        address[] memory addr = new address[](payments.length);
        uint[] memory prices = new uint[](payments.length);

        for(uint i = 0; i < payments.length; i++){
            addr[i] = payments[i].user_wallet;
            prices[i] = payments[i].price;
        }
        balance -= tx.gasprice;
        return (addr, prices);
    }

    function searchPayment(address addr, uint256 price) private
        returns (bool found, uint idx)
    {
        uint i = payments.length - 1;

        for(i; i >= 0; i -= 1){
            if(payments[i].user_wallet == addr && payments[i].price == price){
                return (true, i);
            }
        }
        balance -= tx.gasprice;
        return (false, 0);
    }

    function amountToReturn(uint256 amount) private
        returns (uint256 returnable)
    {
        uint256 realValue;
        realValue = amount-tx.gasprice*2;

        balance -= tx.gasprice;
        return (realValue);
    }

    function getContractBalance() public
        returns (uint256 contractBalance)
    {
        balance -= tx.gasprice;
        return balance;
    }

    function retrievePayment(string calldata passwd, uint256 amount) external payable
        returns (bool res)
    {
        bytes memory _passwd = bytes(passwd);
        if(sha256(_passwd) == passphrase && msg.sender == owner){
            if(balance >= amount){
                owner.transfer(amount);
                return true;
            }
        }
        balance -= tx.gasprice;
        return false;
    }

    function ressetPassphrase(string memory current, string memory newPassphrase) public
        returns (string memory res)
    {
        if(msg.sender == owner && sha256(bytes(current)) == passphrase){
            passphrase = sha256(bytes(newPassphrase));
            return ("Password changed successfully.");
        }
        balance -= tx.gasprice;
        return ("Password or account are wrong.");
    }

}