<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Custom Design</title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/prism.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link href='http://fonts.googleapis.com/css?family=Plaster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>

    <script src="lib/prism.js"></script>
    <script src="lib/fabric.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
    <script src="https://buttons.github.io/buttons.js"></script>
    <script src="lib/jquery.js"></script>
    <script src="lib/bootstrap.js"></script>
  

    
    
  </head>
  <body ng-app="customTshirtDesign">
    
    

    <div class="custom_design_btn">
      <button class="btn btn-object-action">Custom Design</button>
    </div>

    <div id="bd-overlay">

      <div id="bd-wrapper" ng-controller="CanvasControls">

        <div class="header-top">
            <div>
              <h3>Step 1: Design</h3>
            </div>
            <div class="navigation-buttons">
              <ul>
                <li>
                  <button id="nextButton">Next <i class="fas fa-arrow-right"></i></button>
                </li>
                <li>
                  <button id="previousButton" style="display: none;">Previous <i class="fas fa-arrow-left"></i></button>
                </li>
                <li>
                  <button id="closeButton">Close <i class="fas fa-times"></i></button>
                </li>
              </ul>
            </div>
            
        </div>

        <div class="canvas-div">
          <div id="canvas-wrapper">
            <div class="navbar-action">
              <div>
                <h3>Fancy Product Designer</h3>
              </div>
              <div class="universal-buttons">
                <ul>
                  <li class="button-tooltip" data-tooltip="Download Product">
                    <a  id="downloadButton">
                        <i class="fas fa-download"></i>
                      </a>
                  </li>
                  <li class="button-tooltip" data-tooltip="Save Product">
                    <a  id="saveButton">
                        <i class="fas fa-save"></i>
                      </a>
                      <iframe id="download_iframe" name="download_iframe" style="display: none;"></iframe>

                  </li>
                  <li class="button-tooltip" data-tooltip="Print Product">
                    <a id="printButton">
                      <i class="fas fa-print"></i>
                    </a>
                  </li>
                  <li class="button-tooltip" data-tooltip="Remove Selected Items">
                    <a  id="remove-selected" ng-click="removeSelected()">
                        <i class="fas fa-trash"></i>
                      </a>
                  </li>
                  <li class="button-tooltip" data-tooltip="Reset Canvas">
                    <a ng-click="confirmClear()" >
                      <i class="fas fa-eraser"></i>
                    </a>
                  </li>
                </ul>
              </div>
              
            </div>
            <div class="main-canvas">
              <div class="tshirt_image" id="tshirt_image">
                <canvas class="canvas" id="canvas" width="200" height="310"></canvas>
              </div>
            </div>
            
        </div>



        <div id="commands" ng-click="maybeLoadShape($event)">

          <ul class="nav nav-tabs">
            <li class="list-tooltip" data-tooltip="Products" data-target="#addProducts" data-toggle="tab">
                <i class="fas fa-book"></i>
            </li>
            <li class="list-tooltip" data-tooltip="Designs" data-target="#addDesigns" data-toggle="tab">
                <i class="fas fa-image"></i>
            </li>
            <li class="list-tooltip" data-tooltip="Add Text" data-target="#addTextTab" data-toggle="tab">
                <i class="fas fa-font"></i>
            </li>
            <li class="list-tooltip" data-tooltip="Add Own Designs" data-target="#addImage" data-toggle="tab">
                <i class="fas fa-plus-square"></i>
            </li>
            <li class="list-tooltip" data-tooltip="Add Shapes" data-target="#shapes-images" data-toggle="tab">
                <i class="fas fa-shapes"></i>
            </li>
            <li class="list-tooltip" data-tooltip="Draw Here" data-target="#drawDesign" data-toggle="tab">
                <i class="fas fa-pen-nib"></i>
            </li>
            <li class="list-tooltip" data-tooltip="Saved Products" data-target="#savedProducts" data-toggle="tab">
                <i class="fas fa-hdd"></i>
            </li>
          </ul>

          <div class="tab-content">

            <!-- Select Products Tab -->


            <div class="tab-pane active" id="addProducts">
              <div class="product-list">
                <div class="product-image">
                  <li>
                    <img src="../assets/shadows.png" onclick="changeBackgroundImage('../assets/shadows.png')">
                  </li>
                  <li>
                    <img src="../assets/sweater-preview.png" onclick="changeBackgroundImage('../assets/sweater-preview.png')" alt="The image isn't showing">
                  </li>
                </div>
                <div class="product-image">
                  <li>
                    <img src="../assets/wtshirt-preview.png" onclick="changeBackgroundImage('../assets/wtshirt-preview.png')" alt="The image isn't showing">
                  </li>
                  <li>
                    <img src="../assets/hoodie.png" onclick="changeBackgroundImage('../assets/hoodie.png')" alt="The image isn't showing">
                  </li>
                </div>
                <div class="product-image">
                  <li>
                    <img src="../assets/tshirt-basic.png" onclick="changeBackgroundImage('../assets/tshirt-basic.png')">
                  </li>
                  <li>
                    <img src="../assets/cap-preview.png" onclick="changeBackgroundImage('../assets/cap-basic.png')">
                  </li>
                </div>
                
              </div>
            </div>


           <!-- Shapes Tab -->

            <div class="tab-pane" id="shapes-images">
              <p>Add <strong>simple shapes</strong> to canvas:</p>
              <p>
                <button type="button" class="btn rect" ng-click="addRect()" title="Add Rectangle">
                  <img src="../assets/rectangle.png" height="20px" width="20px">
                </button>
                <button type="button" class="btn circle" ng-click="addCircle()" title="Add Circle">
                  <img src="../assets/dry-clean.png" height="20px" width="20px">
                </button>
                <button type="button" class="btn triangle" ng-click="addTriangle()" title="Add Triangle">
                  <img src="../assets/triangle.png" height="20px" width="20px">
                </button>
                <button type="button" class="btn line" ng-click="addLine()" title="Add Line">
                  <img src="../assets/substract.png" height="20px" width="20px">
                </button>
                <button type="button" class="btn polygon" ng-click="addPolygon()" title="Add Polygon">
                  <img src="../assets/hexagon.png" height="20px" width="20px">
                </button>
              </p>

              
            </div>

            <!-- Designs Tab -->

            <div class="tab-pane" id="addDesigns">
              <div class="product-list">
                <div class="design-image">
                  <li>
                    <img src="../assets/designs/converse.png" ng-click="addDesign('../assets/designs/converse.png')">
                  </li>
                  <li>
                    <img src="../assets/designs/crown.png" ng-click="addDesign('../assets/designs/crown.png')">
                  </li>
                </div>
                <div class="design-image">
                  <li>
                    <img src="../assets/designs/heart_blur.png" ng-click="addDesign('../assets/designs/heart_blur.png')">
                  </li>
                  <li>
                    <img src="../assets/designs/heart_circle.png" ng-click="addDesign('../assets/designs/heart_circle.png')">
                  </li>
                </div>
                <div class="design-image">
                  <li>
                    <img src="../assets/designs/men_women.png" ng-click="addDesign('../assets/designs/men_women.png')">
                  </li>
                  <li>
                    <img src="../assets/designs/retro_1.png" ng-click="addDesign('../assets/designs/retro_1.png')">
                  </li>
                </div>
                <div class="design-image">
                  <li>
                    <img src="../assets/designs/retro_2.png" ng-click="addDesign('../assets/designs/retro_2.png')">
                  </li>
                  <li>
                    <img src="../assets/designs/retro_3.png" ng-click="addDesign('../assets/designs/retro_3.png')">
                  </li>
                </div>
                <div class="design-image">
                  <li>
                    <img src="../assets/designs/swirl.png" ng-click="addDesign('../assets/designs/swirl.png')">
                  </li>
                  <li>
                    <img src="../assets/designs/swirl2.png" ng-click="addDesign('../assets/designs/swirl2.png')">
                  </li>
                </div>
                <div class="design-image">
                  <li>
                    <img src="../assets/designs/swirl3.png" ng-click="addDesign('../assets/designs/swirl3.png')">
                  </li>
                  <li>
                    
                  </li>
                </div>
                
              </div>
            </div>

            <!-- Add Text Tab -->

            <div class="tab-pane" id="addTextTab">
              <div>
                <button class="btn" ng-click="addTextbox()">Add textbox</button>
              </div>
             
              <div class="object-controls" object-buttons-enabled="getSelected()">
                <div>
                  <label for="color">Fill:</label>
                  <input type="color" style="width:40px" bind-value-to="fill" class="btn-object-action">
                  <label for="color">Stroke:</label>
                  <input type="color" style="width:40px" bind-value-to="stroke" class="btn-object-action">
                </div>
                <div>
                  <label for="color">Background:</label>
                  <input type="color" value="" id="text-bg-color" size="10" class="btn-object-action" bind-value-to="bgColor">
                  <label for="text-lines-bg-color">Background text color:</label>
                  <input type="color" value="" id="text-lines-bg-color" size="10" class="btn-object-action"
                    bind-value-to="textBgColor">
                </div>
                <div>
                <label for="opacity">Opacity:</label>
                <input value="100" type="range" bind-value-to="opacity" class="btn-object-action">
                
                </div>
                <div id="text-wrapper" ng-show="getText()">
                  <div id="text-controls">
                    <p>Text specific controls</p>
                    <textarea bind-value-to="text" rows="3" columns="80"></textarea><br />
                    <div>
                    <label for="font-family" style="display:inline-block">Font family:</label>
                    <select id="font-family" class="btn-object-action" bind-value-to="fontFamily">
                      <option value="arial">Arial</option>
                      <option value="helvetica" selected>Helvetica</option>
                      <option value="myriad pro">Myriad Pro</option>
                      <option value="delicious">Delicious</option>
                      <option value="verdana">Verdana</option>
                      <option value="georgia">Georgia</option>
                      <option value="courier">Courier</option>
                      <option value="comic sans ms">Comic Sans MS</option>
                      <option value="impact">Impact</option>
                      <option value="monaco">Monaco</option>
                      <option value="optima">Optima</option>
                      <option value="hoefler text">Hoefler Text</option>
                      <option value="plaster">Plaster</option>
                      <option value="engagement">Engagement</option>
                    </select>
                    </div>
                    <div>
                    <label for="text-align" style="display:inline-block">Text align:</label>
                    <select id="text-align" class="btn-object-action" bind-value-to="textAlign">
                      <option>Left</option>
                      <option>Center</option>
                      <option>Right</option>
                      <option>Justify</option>
                      <option>Justify-left</option>
                      <option>Justify-right</option>
                      <option>Justify-center</option>
                    </select>
                    </div>
                    
                    <div>
                      <label for="text-font-size">Font size:</label>
                      <input type="range" value="" min="1" max="120" step="1" id="text-font-size" class="btn-object-action"
                        bind-value-to="fontSize">
                    </div>
                    <div>
                      <label for="text-line-height">Line height:</label>
                      <input type="range" value="" min="0" max="10" step="0.1" id="text-line-height" class="btn-object-action"
                        bind-value-to="lineHeight">
                    </div>
                    <div>
                      <label for="text-char-spacing">Char spacing:</label>
                      <input type="range" value="" min="-200" max="800" step="10" id="text-char-spacing" class="btn-object-action" bind-value-to="charSpacing">
                    </div>
                    <button type="button" class="btn btn-object-action"
                      ng-click="toggleBold()"
                      ng-class="{'btn-inverse': isBold()}">
                      <i class="fas fa-bold"></i>
                    </button>
                    <button type="button" class="btn btn-object-action" id="text-cmd-italic"
                      ng-click="toggleItalic()"
                      ng-class="{'btn-inverse': isItalic()}">
                      <i class="fas fa-italic"></i>
                    </button>
                    <button type="button" class="btn btn-object-action" id="text-cmd-underline"
                      ng-click="toggleUnderline()"
                      ng-class="{'btn-inverse': isUnderline()}">
                      <i class="fas fa-underline"></i>
                    </button>
                    <button type="button" class="btn btn-object-action" id="text-cmd-linethrough"
                      ng-click="toggleLinethrough()"
                      ng-class="{'btn-inverse': isLinethrough()}">
                      <i class="fas fa-strikethrough"></i>
                    </button>
                    <br />
                  </div>
                </div>
                

                

                <div style="margin-top:10px;">
                  <button id="send-backwards" class="btn btn-object-action"
                    ng-click="sendBackwards()">Send backwards</button>
                  <button id="send-to-back" class="btn btn-object-action"
                    ng-click="sendToBack()">Send to back</button>
                </div>

                <div style="margin-top:4px;">
                  <button id="bring-forward" class="btn btn-object-action"
                    ng-click="bringForward()">Bring forwards</button>
                  <button id="bring-to-front" class="btn btn-object-action"
                    ng-click="bringToFront()">Bring to front</button>
                </div>

              
                <div id="cacheInspector">
                </div>
              </div>
            
            </div>

            <!-- Add Image Tab -->

             <div class="tab-pane add-image-tab" id="addImage">
              <h4>Add <strong>Own</strong> Designs</h4>
              <div class="image-upload-section">
                <input type="file" id="imageUpload" accept="image/*">
                <button type="button" class="btn btn-object-action" onclick="handleImageUpload()">Upload Image</button>
              </div>
              

              <div id="imageList"></div>

              <div class="clear-buttons">
                <button class="btn btn-danger clear" ng-click="confirmClear()" title="Clear Canvas">
                  <img src="../assets/broom.png" height="20px" width="20px">
                </button>
                <button class="btn btn-object-action" id="remove-selected"
                  ng-click="removeSelected()" title="Delete Selected Items">
                  <img src="../assets/delete.png" height="20px" width="20px">
                </button>
              </div>
            </div>

            <!-- Draw Design Tab -->

            <div class="tab-pane" id="drawDesign">

              <div style="margin-top:10px;" id="drawing-mode-wrapper">

                <button id="drawing-mode" class="btn btn-info"
                  ng-click="setFreeDrawingMode(!getFreeDrawingMode())"
                  ng-class="{'btn-inverse': getFreeDrawingMode()}">
                  {[ getFreeDrawingMode() ? 'Exit free drawing mode' : 'Enter free drawing mode' ]}
                </button>

                <div id="drawing-mode-options" ng-show="getFreeDrawingMode()">
                  <label for="drawing-mode-selector">Mode:</label>
                  <select id="drawing-mode-selector" bind-value-to="drawingMode">
                    <option>Pencil</option>
                    <option>Circle</option>
                    <option>Spray</option>
                    <option>Pattern</option>

                    <option>hline</option>
                    <option>vline</option>
                    <option>square</option>
                    <option>diamond</option>
                    <option>texture</option>
                  </select>
                  <br>
                  <label for="drawing-line-width">Line width:</label>
                  <input type="range" value="30" min="0" max="150" bind-value-to="drawingLineWidth">
                  <br>
                  <label for="drawing-color">Line color:</label>
                  <input type="color" value="#005E7A" bind-value-to="drawingLineColor">
                  <br>
                  <label for="drawing-shadow-width">Line shadow width:</label>
                  <input type="range" value="0" min="0" max="50" bind-value-to="drawingLineShadowWidth">
                </div>
              </div>

              
            </div>

             <!-- All Saved Products Tab -->

            <div class="tab-pane" id="savedProducts">
              <h4>All Saved Products</h4>
              <div class="saved_image">
                
              </div>
            </div>
            

          </div>

        </div>

        <div class="cart-div"></div>

      </div>
    </div>


    
   

    <script>
      var customTshirtDesign = { };
      var canvas = new fabric.Canvas('canvas');
    </script>

    <script src="js/fabric/utils.js"></script>
    <script src="js/fabric/app_config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script src="js/fabric/controller.js"></script>

   

  </body>
</html>
