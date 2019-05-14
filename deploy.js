global.path = require('path');
global.fs = require('fs-extra');
global.solc = require('solc');
global.Web3 = require('web3');


let argv = require('minimist')(process.argv.slice(2));

let accounts = [
    {
        address: '0x511750685d1ac3f579fb2d61a021e7f4a53d7fdf',
        key: '7cbd75d6bd2c3ed03f442d4a05c8fbb7c89af14684634e9cd9c2e6b2e92b58d9',
    }
]

let selectedHost = 'http://127.0.0.1:8545';
web3 = new Web3(new Web3.providers.HttpProvider(selectedHost));

let gasPrice = web3.eth.gasPrice;
let gasPriceHex = web3.utils.toHex(gasPrice);
let gasLimitHex = web3.utils.toHex(6000000);
let nonce = web3.eth.getTransactionCount(accounts[0].address, 'pending');
let nonceHex = web3.utils.toHex(nonce);

function deploy(contract)
{
    console.log('>>Deploying '+contract+'.json');

    let jsonOutputName = path.parse(contract).name + '.json';
    let jsonFile = './build/' + jsonOutputName;


    let webJsonFile = './assets/contracts/' + jsonOutputName;
    let result = false;

    try{
        result = fs.statSync(jsonFile);
    }catch(e){
        console.log(e.message);
        return result;
    }

    let contractJsonContent = fs.readFileSync(jsonFile, 'utf8');
    let jsonOutput = JSON.parse(contractJsonContent);

    let abi = jsonOutput.abi;
    let bytecode = jsonOutput.evm.bytecode.object;

    let myContract = new web3.eth.Contract(abi);

    let contractData = myContract.new.getData({
        data: '0x' + bytecode
    });

    let rawTx = {
        nonce: nonceHex,
        gasPrice: gasPriceHex,
        gasLimit: gasLimitHex,
        data: contractData,
        from: accounts[0].address
    };

    let pkey = new Buffer(accounts[0].key, 'hex');
    let tx = new rawTx(rawTx);

    tx.sign(pkey);

    let serializedTx = tx.serialize();
    let receipt = null;

    webJsonFile.eth.sendRawTransaction('0x' + serializedTx.toString('hex'), (err, hash) => {
        if(err){
            console.log(err); 
            return false;
        }

        console.log('Contract creation tx: '+ hash);

        while(receipt == null){
            receipt = web3.eth.getTransacionReceipt(hash);

            Atomics.wait(new Int32Array(new SharedArrayBuffer(4)), 0, 0, 1000);
        }

        console.log('Contract address: ' + receipt.contractAddress);
        console.log('Contract File: ' + contract);

        jsonOutput['contracts'][contract]['contractAddress'] = receipt.contractAddress;

        let webJsonOutput = {
            abi: abi,
            contractAddress: contractAddress
        };

        let formattedJson = JSON.stringify(jsonOutput, null, 4);
        let formattedWebJson = JSON.stringify(webJsonOutput);

        console.log('_____________________');
    });

    return true;
}

if(typeof argv.deploy !== 'undefined'){

    let contract = argv.deploy;
    let result = deploy(contract);

    if(result) console.log('Deploy completed.');
    else console.log('Something wrong happened..');
}else{
    console.log('Invalid contract name \'%j\'.', argv);
}

