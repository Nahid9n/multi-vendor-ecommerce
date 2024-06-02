@extends('customer.layout')
@section('title', 'Customer Wallet')
@section('content')

<style>
    .rechage_wallet {
        background-color: black;
        text-align: center;
        color: #fff;
        border-radius: 5px;
        padding: 25px 0;
        min-height: 158px;
        cursor: pointer;
    }

    .rechage_wallet p {
        color: #fff;
        font-size: 15px;
    }

    #rechange_amount {
        font-weight: bold;
        color: #fff;
        font-family: 'Lato';
    }

    .dollar_icon {
        font-size: 40px;
        padding-bottom: 15px;
        color: #fff6;
    }

    .content_one {
        margin-top: 20px;
    }

    .content_two {
        margin-top: 30px;
    }

    .rechage_wallet_two {
        background: #f5f5f5;
        color: #000;
        text-align: center;
        cursor: pointer;
        min-height: 158px;
        padding: 25px 0;
    }

    .plug_icon {
        font-size: 40px;
        padding-bottom: 15px;
    }

    .rechage_wallet_two p {
        font-size: 15px;
    }

    .modal-body input {
        width: 100%;
    }

    .amount_recharge {
        height: auto;
        padding: 3px 12px !important;
        border-radius: 3px !important;
    }

    .modal-footer button {
        border-radius: 5px;
    }
</style>

<div class="col-md-8">
    <div class="row">
        <div class="col-lg-12">
            <h4>My Wallet</h4>
        </div>
    </div>

    <div class="row content_one">
        <div class="col-lg-4">
            <div class="rechage_wallet">
                <i class="fa fa-usd dollar_icon" aria-hidden="true"></i>
                <p>Wallet Balance</p>
                <p>$ <sapn id="rechange_amount">{{ $currect_balance->balance }}</sapn>
                </p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="rechage_wallet_two" data-toggle="modal" data-target="#onlineRechageWallet">
                <i class="fa fa-plus-circle plug_icon" aria-hidden="true"></i>
                <p>Recharge Wallet</p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="rechage_wallet_two" data-toggle="modal" data-target="#offlineRechageWallet">
                <i class="fa fa-plus-circle plug_icon" aria-hidden="true"></i>
                <p>Offline Recharge Wallet</p>
            </div>
        </div>
    </div>

    <div class="row content_two">
        <div class="col-lg-12">
            <h4>Wallet Recharge History</h4>
        </div>


        <div class="col-lg-12 mt-10">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payment method</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($wallet as $wallet_item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $wallet_item->created_at }}</td>
                        <td>{{ $wallet_item->balance }}</td>
                        <td>{{ $wallet_item->payment_method }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="onlineRechageWallet" tabindex="-1" aria-labelledby="onlineRechageWalletModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form action="{{ route('wallet-online-recharge') }}" method="post">
                    @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="onlineRechageWalletModalLabel">Recharge Wallet</h5>
            </div>
            <div class="modal-body">                
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 text-left">
                            Payment method <span class="text-danger">*</span>
                        </div>
                        <div class="col-lg-8">
                            <select name="payment_type" class="form-control form-control-sm">
                                <option>Paypal</option>
                                <option>Stripe</option>
                                <option>Visa Card</option>
                                <option>Master Card</option>
                            </select>
                        </div>
                    </div>
                    <div class="row row mt-10">
                        <div class="col-lg-4 text-left">
                            Amount <span class="text-danger">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input name="amount" type="number" class="form-control form-control-sm amount_recharge" placeholder="Enter Amount">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="offlineRechageWallet" tabindex="-1" aria-labelledby="offlineRechageWalletModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="offlineRechageWalletModalLabel">Offline Recharge Wallet</h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">

                    <div class="row row">
                        <div class="col-lg-4 text-left">
                            Amount <span class="text-danger">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm amount_recharge" placeholder="Enter Amount">
                        </div>
                    </div>
                    
                    <div class="row row mt-10">
                        <div class="col-lg-4 text-left">
                        Transaction ID <span class="text-danger">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm amount_recharge" placeholder="Transaction ID">
                        </div>
                    </div>

                    <div class="row row mt-10">
                        <div class="col-lg-4 text-left">
                        Photo <span class="text-danger">*</span>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" class="form-control form-control-sm amount_recharge" placeholder="Enter Amount">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection