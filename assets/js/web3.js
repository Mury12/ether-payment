
web3 = new Web3j("http://127.0.0.1:8545");

let data = {
    accounts: []
}

let eth3 = new Vue({
    el: '#web3',
    data: data,
    
    methods: {
        getAccounts: function()
        {

            setInterval(function(){
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
            setInterval(function(){
                var i = 0 ;
                if(data.accounts.length > 0){
                    i = 0;
                    $(data.accounts).each(function(){
                        eth3.getBalance(data.accounts[i].hash, i);
                        i++;
                    });
                    i=0;
                }
            },10000)
        }
    },

    created: function (){
        
    }
})