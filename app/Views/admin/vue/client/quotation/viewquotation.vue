<template>
	<section id="">
		<div class="modal fade modal-right-slide" id="quotationview" role="dialog"  data-backdrop="false" ref="content">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header panel-heading">

	                	<button type="button" class="close" data-dismiss="modal" >&times;</button>

                  	<span class="action_buttons" style="margin-top:-20px">
                      <a href="javascript:void(0)" id="printinvoice">
                       <i class="fa fa-print" aria-hidden="true"></i>Print  
                      </a>
                      <a href="javascript:void(0)" @click="createpdf">
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>PDF
                      </a>
                    </span>
                  		
	                </div>

                  

	                <div id="printThis" class="modal-body">
	                	<!-- title row -->
                        <div class="row">
                          <div class="col-xs-12 invoice-header">
                            <h1>
	                            <i class="fa fa-globe"></i> Quotation
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
                            <b>Quotation ID #{{invoice.id}}{{client.id}}</b>                            
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
                              DigiZigs develops innovative strategies for brands and organizations.
                              We believe in tapping all possible opportunities out there in the market
                              backed by robust research that is relevant to the industry. Getting an
                              overall view of national trends with rigorous analytics, we would help
                              your brand to easily overcome all the potential barriers while the new
                              brand is being launched and effectively align organizational resources
                              to take action.
                              We would bring in the best expertise from marketing and operations
                              field to deliver recommendations that are highly strategic and
                              immensely practical, where assurance is given and be accountable for
                              every decision taken for the real impact
                            </p>
                          </div>
                          <!-- /.col -->
                          <div class="col-xs-6">
                            <p class="lead">Complition Date {{invoice.due_date}}</p>
                            <div class="table-responsive">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{invoice.bill_amount}}</td>
                                  </tr>

                                  <tr>
                                    <th>Promo/Discount @ ({{discount}}%)</th>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i>{{invoice.discount}}</td>
                                  </tr>  

                                  <tr>
                                    <th>GST @ ({{qgst}}%)</th>
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
                            <h5><b><u>Terms and condition</u></b></h5>
                            <ul>
                              <li>
                                1)All the legal taxes will be charged extra on above charges.
                              </li>
                              <li>
                                2)50% advance payment before commence of the project,pending payment will be paid post completion project.
                              </li>
                              <li>
                                3)Any image purchase or usage charges as extra.
                              </li>
                              <li>
                                4)Any required photo-shoot or model / contract charges will be charged extra.
                              </li>
                              <li>
                                5)Any other project / work not mentioned in this document should be discussed and
                                  confirmation of the rates, or else we will charge it extra as per our standard rate
                                  card.
                              </li>
                              <li>
                                6)Once the work order is issued, in case of cancellation, advances will not be
                                  refunded.
                              </li>
                              <li>
                                7)All the approvals on the final approved art work would be taken on hard copy
                                  print or through mails with the approval signature and date.
                              </li>
                              <li>
                                8)This Proposal is valid up to 07 days from the date of submission.
                              </li>
                            </ul>
                          </div>
                        </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
</template>

<script type="text/javascript">
  import jsPDF from 'jspdf';
  import html2canvas from 'html2canvas';
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
        return (this.invoice.discount / this.invoice.bill_amount) * 100;
      },
      grandtotal:function(){
        return ((this.totalbill-this.discount) + this.gst );
      },
      
    },
    methods:{
      createpdf(){
        console.log('Create Pdf')
        /*axios.get('quotation/pdf')
          .then((response) => {console.log(response.data)})//this.appointments=response.data
          .catch((error) => this.errors = error)*/
          /*let pdfName = 'test'; 
          var doc = new jsPDF();
          doc.text("Hello World", 10, 10);
          doc.save(pdfName + '.pdf');*/

          /*const doc = new jsPDF();
          const contentHtml = this.$refs.content.innerHTML;
          doc.fromHTML(contentHtml, 15, 15, {
            width: 170
          });
          doc.save("sample.pdf");*/
          const doc = new jsPDF();
          var canvasElement = document.createElement('canvas');
          html2canvas(this.$refs.content, { canvas: canvasElement 
            }).then(function (canvas) {
          const img = canvas.toDataURL("image/png");
          doc.addImage(img,'JPEG',20,20);
          doc.save("sample.pdf");
         });


      }
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