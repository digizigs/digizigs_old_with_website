<template>
	<section id="">
		<div class="modal fade modal-right-slide" id="invoiceview" role="dialog"  data-backdrop="false">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header panel-heading">

	                	<button type="button" class="close" data-dismiss="modal" >&times;</button>

                  	<span class="action_buttons" style="margin-top:-20px">
                      <a href="" id="printinvoice">
                       <i class="fa fa-print" aria-hidden="true"></i>Print  
                      </a>
                      <a href="">
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>PDF
                      </a>
                      <a href="">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>Payment
                      </a> 
                    </span>
                  		
	                </div>

	                <div id="printThis" class="modal-body">
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
                                <br>Phone: (+91) 97123 40450
                                <br>Email: info@digizigs.com
                                <br>GST No: {{gstno}}
                                <br>Reg No: {{regno}}
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{client.client_name}}</strong>
                                <br>Phone: {{client.client_phone}}
                                <br>Email: {{client.client_email}}
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            <br>
                            <b>Invoice #{{invoice.id}}{{client.id}}</b>                            
                            <br>
                            <b>Payment Due:</b> {{invoice.due_date}}
                            <br>
                            <b> CLient ID:</b> {{client.id}}
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
                                  <th>Service</th>
                                  
                                  <th style="width: 59%">Description</th>
                                  <th>Subtotal</th>
                                </tr>
                              </thead>
                              <tbody>

                                <tr v-for="item in items">
                                  <td>{{item.name}}</td>                             
                                  <td>{{item.description}}</td>
                                  <td>{{item.charge}}</td>
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
                              Payment of each invoiced amount is due within 30 days of the invoice date.
                              subject to a ½ of 1% discount if paid within ten (10) days of the date of this invoice. Any
                              payments not made within thirty (30) days of the date of this invoice shall be
                              subject to a late payment charge of 1½% per month (compounded) on the unpaid
                              balance of any amount then passed due
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
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{invoice.bill_amount}}</td>
                                  </tr>

                                  <tr>
                                    <th>Promo/Discount</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{invoice.discount}}</td>
                                  </tr>  

                                  <tr>
                                    <th>GST@({{qgst}}%)</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{invoice.tax}}</td>
                                  </tr>
                                                                   
                                  <tr>
                                    <th>Total:</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{invoice.net_bill_amount}}</td>
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
                            <button  class="btn btn-default" onclick="javascript.printinvoice();"><i class="fa fa-print"></i> Print</button>
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
    props:['invoice','client','items','qgst','regno','gstno'],
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
            return total + item.charge;
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

<style lan="scss">

  

  .action_buttons{
    margin-top: -10px !important;
    a{
      margin-left: 10px !important;
    }
  }
  .modal-header i{
    margin-left: 10px !important;
    margin-top: -10px !important;
    .action_buttons{
      margin-top: -10px !important;
    }
  }

</style>