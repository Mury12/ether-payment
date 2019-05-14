
<section id="first-board" class="bg-brand-dark vh-min-100 b-shadow z-2 p-rel pt-5">
    <div class="container p-5" id="web3">
        <div class="row">
            <div class="col-12 ml-2 text-center" >
                <h2 class="t-orange">Hello World!</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
                <button class="btn btn-info" @click="getAccounts"> Request Accounts</button>
                <button class="btn btn-info" @click="getHashRate"> Request Hashrate</button>
                <button class="btn btn-info" @click="killBalances = true, killWallets = true"> Stop Updates</button><br/>
                <label class="btn btn-info" @click="getContractBalance">
                    <input type="text" name="addr" v-model="contractAddress"><br/>
                    Consume Contract
                </label>
                <label class="btn btn-info" @click="insertPaymentIntention">
                    <input type="text" name="addr" v-model="contractAddress"><br/>
                    Consume Contract
                </label>
                <label class="btn btn-info" @click="updateWallet">
                    <input type="text" name="addr" v-model="userWallet"><br/>
                    Update Wallet
                </label>

                <p class="t-white" v-if="contract">{{contract.message}}</p>

                <p class="t-white">

                    <table class="t-white mt-5" align="center">
                        <tr class="text-strong text-center t-white">
                            <td>Address</td>
                            <td>Balance</td>
                        </tr>
                        <tr v-for="(account, idx) in accounts">
                            <td>{{account.hash}}</td>
                            <td class="px-4 text-right">{{account.balance}}</td>
                        </tr>
                    </table>

                </p>
            </div>
        </div>
    </div>
</section>
<?php

