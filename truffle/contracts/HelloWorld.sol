pragma solidity >=0.4.21 <0.6.0;

contract HelloWorld
{
    string public message;

    function Hello() public  
    {
        message = "Hello World from Ethereum Blockchain!";
    }

    function getMessage() public view returns(string memory myString) 
    {
        return message;
    }
}