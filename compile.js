global.path = require('path');
global.fs = require('fs-extra');
global.solc = require('solc');
/**
 * Make sure that the build folder is deleted before every compilation
 * @returns {*} - path
 */
function compilingPreparations()
{
    const buildPath = path.resolve(__dirname, 'build');
    fs.removeSync(buildPath);
    return buildPath;
}

/**
 * 
 */
function createConfiguration()
{
    return {
        language: 'Solidity',
        sources: {
            'HelloWorld' : {
                content: fs.readFileSync(path.resolve(__dirname, 'contracts', 'HelloWorld.sol'), 'utf8')
            }
        },
        settings: {
            outputSelection: {
                '*': {
                    '*': ['*']
                }
            }
        }
    };
}

/**
 * 
 */

function getImports(dependency)
{
    return {
        contents: fs.readFileSync(path.resolve(__dirname, 'contracts', dependency))
    };
}

function compileSources(config) 
{
    try{
        return JSON.parse(solc.compile(JSON.stringify(config), getImports));
    }catch(e){
        console.log(e);
    }
}

function errorHandling(compiledSources)
{
    if(!compiledSources){
        console.log('>>>> ERRORS <<<<\n', 'NO OUTPUT');
    }
    else if(compiledSources.errors){
        compiledSources.errors.map(error=> console.log(error.formattedMessage));
    }
}

function writeOutput(compiled, buildPath)
{
    fs.ensureDirSync(buildPath);

    for(let contractFileName in compiled.contracts){
        const contractName = contractFileName.replace('.sol', '');
        console.log('Writting: ', contractFileName+'.json');
        fs.outputJsonSync(
            path.resolve(buildPath, contractFileName + '.json'),
            compiled.contracts[contractFileName][contractName]
        );
    }
}

const buildPath = compilingPreparations();
const config = createConfiguration();
const compiled = compileSources(config);
errorHandling(compiled);
writeOutput(compiled, buildPath);