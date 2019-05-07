const PaymentHolder = artifacts.require("PaymentHolder");

module.exports = function(deployer) {
  let _passwd = 'jnd2l3h';
  deployer.deploy(PaymentHolder, _passwd);
};
