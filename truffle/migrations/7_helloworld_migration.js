const PaymentHolder = artifacts.require("PaymentHolder");

module.exports = function(deployer) {
  let _passwd = 'jnd2l3h23';
  deployer.deploy(PaymentHolder, _passwd);
};
