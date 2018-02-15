<script src="module/homepage/view/js/productosAPI.js" ></script>
<div class="container">
	<div class="panel panel-default aboutus-text">
	  
		<div class="panel-heading">
			<div class=" row" >
				<div class="col-md-4">
					<b>Price: </b><p>EUR <span id="price"></span></p>
				</div>
				<div class="col-md-4">
					<b>Publication Date: </b><p><span id="publicationDate"></span></p>
				</div>
				<div class="col-md-4">
					<b>Vendido por: </b><p><span id="vendedor"></span></p>
				</div>										
			</div>    
		</div>

		<div class="panel-body">
		    <div class="row ">
					
				<div class="col-md-12">
					<div class="col-md-4 thumbnail" >						
							<img id="fotoProducto" >						
					</div>

					<div class="col-md-6  ">						
							<div class="col-md-12">	
								<p><strong id="titulo"></strong></p>							
								<p  class="text-justify" id="description"></p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore animi numquam tempora libero, inventore eligendi id rerum veniam. Ratione voluptates, non iure, vitae saepe accusantium officiis sunt recusandae nulla deserunt accusamus adipisci natus omnis nesciunt ullam doloribus. Perspiciatis dolores, quibusdam consectetur. Quam qui, explicabo nisi.</p><br>
							</div>
								
							<div class="col-md-3 text-right" >							
								<strong>Envio:</strong>
							</div>
							<div class="col-md-9">
								 <span>GRATIS Estándar</span>
							</div>

							<div class="col-md-3 text-right" >							
								<strong>Entrega:</strong>
							</div>
							<div class="col-md-9">
								 <span>Prevista entre el lun. 19 feb. y el mar. 20 feb.</span>
							</div>


							<div class="col-md-3 text-right" >							
								<strong>Pagos:</strong>
							</div>
							<div class="col-md-9">
								 <span>Pagos con tarjeta de crédito procesados por PayPal</span>
								 <p><img  style="width: 200px;" src="view/img/pago/tarjetas.png" alt=""></p>
							</div>


							<div class="col-md-3 text-right" >							
								<strong>Devoluciones:</strong>
							</div>
							<div class="col-md-9">
								 <span>Reembolso de 14 días, vendedor.</span>
							</div>

							
							<div class="col-md-3 text-right" >							
								<strong>Garantia:</strong>
							</div>
							<div class="col-md-9">
								 <span>GARANTÍA AL CLIENTE DE lorem</span>
							</div>
						<div class="col-md-12">
							<br>
							<br>							
							<a href="#" type="button" class="btn btn-primary col-md-12 addCarrito" id="buyNOW" title="">Add to my basket</a>
						</div>
					</div>
					<div class="col-md-2 " style=" text-align:center; ">					
						<div class="list-group">
							  <a href="#" class="list-group-item ">Cras justo odio</a>
							  <a href="#" class="list-group-item">Dapibus ac facil</a>
							  <a href="#" class="list-group-item">Morbi leo risus</a>
							  <a href="#" class="list-group-item">Porta ac consect</a>
							  <a href="#" class="list-group-item">Vestibulum at</a>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<style type="text/css"> 
			              #results_api { font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; } 
			              #title_api { color: #777; font-weight: normal; font-size: 24px; margin: 0; margin-left: 5px; } 
			              #fila_api { border-bottom: 1px solid #CCC; padding: 15px 0; display: block; } 
			              .image-container { text-align: center; border: 1px solid #CCC; width: 150px; } 
			              .data-container { vertical-align: top; padding-left: 15px; } p { margin: 0 0 5px; } 
			              .item-link, 
			              .item-link:hover, 
			              .item-link:visited, 
			              .item-link:active { text-decoration: none; color: #333; } 
			              .title { color: #5786bd; font-weight: bold; margin-bottom: 10px; } 
			              .subtitle { color: #777; font-size: 12px; } 
			              .price { color: #333; font-weight: bold; } 
			              .bin { color: #777; font-size: 12px; } 
			              .fs { font-size: 12px; font-weight: bold; }
		            </style>
	                <br><br>
	                <h3 id="title_api">Recommended Products</h3>
		            <div id="pruductosAPI">
		                <script async defer  id="script_apiProd"></script>
		                <script >function _cb_findItemsByKeywords(root) { 
		                    var items = root && root.findItemsByKeywordsResponse && root.findItemsByKeywordsResponse[0] && root.findItemsByKeywordsResponse[0].searchResult && root.findItemsByKeywordsResponse[0].searchResult[0] && root.findItemsByKeywordsResponse[0].searchResult[0].item || []; 
		                    var html = []; 

		                    html.push('<table width="100%" border="0" cellspacing="0" cellpadding="3">  <tbody>'); 

		                    for (var i = 0; i < items.length; ++i) { 
		                      var item = items[i]; 
		                      var shippingInfo = item.shippingInfo && item.shippingInfo[0] || {}; 
		                      var sellingStatus = item.sellingStatus && item.sellingStatus[0] || {}; 
		                      var listingInfo = item.listingInfo && item.listingInfo[0] || {}; 
		                      var title = item.title; 
		                      var subtitle = item.subtitle || ''; 
		                      var pic = item.galleryURL; 
		                      var viewitem = item.viewItemURL; 
		                      var currentPrice = sellingStatus.currentPrice && sellingStatus.currentPrice[0] || {}; 
		                      var displayPrice = currentPrice['@currencyId'] + ' ' + currentPrice['__value__']; 
		                      var buyItNowAvailable = listingInfo.buyItNowAvailable && listingInfo.buyItNowAvailable[0] === 'true'; 
		                      var freeShipping = shippingInfo.shippingType && shippingInfo.shippingType[0] === 'Free'; 

		                      if (null !== title && null !== viewitem) { 
		                        html.push('<tr id="fila_api"><td class="image-container"><img src="' + pic + '"border = "0"></td>'); 
		                        html.push('<td class="data-container"><a class="item-link" href="' + viewitem + '"target="_blank">'); html.push('<p class="title">' + title + '</p>'); 
		                        html.push('<p class="subtitle">' + subtitle + '</p>'); 
		                        html.push('<p class="price">' + displayPrice + '</p>'); 
		                        if (buyItNowAvailable) { 
		                          html.push('<p class="bin">Buy It Now</p>'); 
		                        } 
		                        if (freeShipping) { 
		                          html.push('<p class="fs">Free shipping</p>'); 
		                        } 
		                        html.push('</a></td></tr>'); } 
		                      } 

		                    html.push("</tbody></table>"); 

		                    document.getElementById("pruductosAPI").innerHTML = html.join(""); 
		                  } 
		                </script>
		            </div>    
			</div>
				
			</div>
	 	</div>
	</div>
</div>