<template>
	<section>
		<div class="modal fade" id="invoiceview" role="dialog"  data-backdrop="false">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header panel-heading">
	                	<button type="button" class="close" data-dismiss="modal" >&times;</button>
                  		<i class="fa fa-user-circle" aria-hidden="true"></i>
                  		
	                </div>

	                <div class="modal-body">
	                	<!-- title row -->
                        <div class="row">
                          <div class="col-xs-12 invoice-header">
                            <h1>
	                            <i class="fa fa-globe"></i> Invoice.
	                            <small class="pull-right">Date: {{invoice.bill_date}}</small>
	                        </h1>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                          <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Digizigs Web technologies</strong>
                                <br>202-Rajeshwer Planet
                                <br>Baroda, Gujarat
                                <br>Phone: (+91) 97123 40450
                                <br>Email: info@digizigs.com
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{client.client_name}}</strong>
                                <br>795 Freedom Ave, Suite 600
                                <br>New York, CA 94107
                                <br>Phone: 1 (804) 123-9876
                                <br>Email: jon@ironadmin.com
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b>
                            <br>
                            <br>
                            <b>Order ID:</b> 4F3S8J
                            <br>
                            <b>Payment Due:</b> {{invoice.due_date}}
                            <br>
                            <b>Account:</b> 968-34567
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                          <div class="col-xs-12 table">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Qty</th>
                                  <th>Service</th>
                                  
                                  <th style="width: 59%">Description</th>
                                  <th>Subtotal</th>
                                </tr>
                              </thead>
                              <tbody>

                                <tr v-for="item in items">
                                  <td>1</td>
                                  <td>{{item.service_name}}</td>                             
                                  <td>{{item.service_description}}</td>
                                  <td>{{item.service_charge}}</td>
                                </tr>                               

                              </tbody>
                            </table>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">

                          <!-- accepted payments column -->
                          <div class="col-xs-6">
                            
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p>
                          </div>
                          <!-- /.col -->
                          <div class="col-xs-6">
                            <p class="lead">Amount Due by {{invoice.due_date}}</p>
                            <div class="table-responsive">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{totalbill}}</td>
                                  </tr>

                                  <tr>
                                    <th>Promo/Discount ({{invoice.discount}}%)</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{discount}}</td>
                                  </tr>  

                                  <tr>
                                    <th>GST ({{invoice.tax}}%)</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{gst}}</td>
                                  </tr>
                                                                   
                                  <tr>
                                    <th>Total:</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{grandtotal}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                          <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                          </div>
                        </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
</template>

<script type="text/javascript">
  export default{
    props:['invoice','client','items'],
    data(){
      return{
       listitem:[]
      
      }
    },
    watch:{
    },
    computed: {
      totalbill: function(){      
        if(this.items !== ''){
          return this.items.reduce(function (total, item) { 
            return total + item.service_charge;
          },0)
        }
      },
      gst:function(){
        return ((this.totalbill-this.discount) * this.invoice.tax )/100;
      },
      discount:function(){
        return (this.totalbill * this.invoice.discount )/100;
      },
      grandtotal:function(){
        return ((this.totalbill-this.discount) + this.gst );
      },
      
    },
    methods:{
    
    },
    created(){
      this.listitem = this.items;
    }
  };
</script>

<style type="text/css" Scoped>

.modal-content{
	border-radius: 2px !important;
}
</style>