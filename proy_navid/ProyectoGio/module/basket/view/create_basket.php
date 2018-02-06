
<script src="module/basket/view/js/basket.js"></script>

<div class="container">
    <div class="row">                
        <p class="aboutus-text text-center" id="p_basket">No hay productos en la cesta</p>

        <div class="col-md-7 tabla_basket1" style="display: none">       
            <div class="form-group">        	
                <table class="table table-hover display" id="tab_comprar">
                    <thead>                        
                        <tr style="background: silver;" >
                            <td><b>Product</b></td>
                            <td><b>Euros/Unit</b></td>
                            <td><b>Quantity</b></td>
                            <td><b>Price</b></td>
                            <td class="text-center" ><b>SETTINGS&nbsp;</b><span class="glyphicon glyphicon-cog"></span></td>
                        </tr>
                    </thead>
                    <tbody id="body_comprar">                                            
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-offset-1 col-md-4 tabla_basket1" style="display: none" >
            <p><strong>Total: </strong><i id="totalPagar"></i></p>
            <button id="pay_products" class="btn btn-warning" style="color:black"><b>Proceed to Checkout</b></button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
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
            <div id="results_api">
                <script async defer  id="script_api"></script>
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

                    document.getElementById("results_api").innerHTML = html.join(""); 
                  } 
                </script>

            </div>        
        </div>
    </div>
</div>






<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
