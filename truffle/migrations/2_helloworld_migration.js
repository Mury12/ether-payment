const PaymentHolder = artifacts.require("PaymentHolder");

module.exports = function(deployer) {
  deployer.deploy(PaymentHolder);
};
