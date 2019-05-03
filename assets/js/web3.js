global.Web3j = require('web3');


web3 = new Web3j("http://127.0.0.1:8545");

let data = {
    accounts: [],
    killWallets: false,
    killBalances: false,
    contractAddress: "0xa6D0DE48DCf96Fc62Ea9DB392Ae00f29ba96BF22",
    contract: false,
    truffleDirectory: "../../truffle/build/contracts/",
    contractName: 'HelloWorld',
}

let eth3 = new Vue({
    el: '#web3',
    data: data,
    
    methods: {
        getAccounts: function()
        {
            let walletsUpdate = setInterval(function(){
                web3.eth.getAccounts().then(function(r){

                    if(r.length == data.accounts.length) return;
                    let arr = [];

                    r.forEach( elem => {
                        let account = {
                            hash: elem,
                            balance: '0 ETH'
                        }
                        arr.push(account);
                        console.log(arr);
                    });
                    data.accounts =  arr;

                    var i = 0 ;
                    if(data.accounts.length > 0){
                        i = 0;
                        $(data.accounts).each(function(){
                            eth3.getBalance(data.accounts[i].hash, i);
                            i++;
                        });
                        i=0;
                    }
                })
                data.killWallets ? clearInterval(walletsUpdate) : true;
            },10000);
            eth3.updateBalances();
        },

        getHashRate: function ()
        {
            web3.eth.getHashrate().then(function(r){
                simpleAlert.show({
                    message: r+' H/s',
                    type: 'success'
                });
            });
        },
        getBalance: function(account, idx)
        {
            web3.eth.getBalance(account).then(function(r){
                data.accounts[idx].balance = r/10**18 + ' ETH';
            })
        },

        updateBalances: function()
        {
            let balancesUpdate = setInterval(function(){
                var i = 0 ;
                if(data.accounts.length > 0){
                    i = 0;
                    $(data.accounts).each(function(){
                        eth3.getBalance(data.accounts[i].hash, i);
                        i++;
                    });
                    i=0;
                }
                data.killBalances ? clearInterval(balancesUpdate) : true;
            },10000)
        },

        consumeContract: function()
        {
            if(this.contractAddress.length > 10){
                let contractJSON;
                let myContract
                $.getJSON(this.truffleDirectory+this.contractName+'.json').then(json =>{
                    contractJSON = json;
                    myContract = new web3.eth.Contract(contractJSON.abi, this.contractAddress);
                    myContract.methods.Hello().send({from:'0x5884E106E91F3f1611b81022e59d1573ABe82820'}, (err, result)=>{
                        if(!err){
                            myContract.methods.getMessage().call().then( (error, result) => {
                                let contract = result;
                                this.contract = contract;
                            })
                        }
                    });
                })
            }

        },
    },

    created: function (){
        
    }
})