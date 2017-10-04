<!--
======================================================================================================================================
Application to add items into a datbase. The application is a mock application of the current AOSS Inventory Addition System.
    *** @Author: Nischal Basnet
    *** @Date: 10/03/2017
    *** Built as a project for AOSS Medical Supplies, Monroe, LA, 71203, USA
======================================================================================================================================
!-->
<!doctype html>
<html>

    <head>
        
        <title> Add Items </title>
    
    </head>
    
    <header>
    
        <div id = "pageHeader">
        
            <h1> AOSS E-STORE INVENTORY MANAGEMENT SYSTEM </h1>
            
        </div>
        
    </header>
    
    <body>
        
        <div id = "bodyHeader">
        
            <h3> ADD AN ITEM </h3>
    
        </div>
        
        <div id = "container">
            
            <form enctype = "multipart/form-data" action = "processItem.php" method="post">
                
                <div>
                
                    <label for = "itemSKU"> SKU : </label>
                
                </div>
                
                <div>
                    
                    <input type = "text" id = "itemSKU" name = "itemSKU" class = "inputFields" autofocus = "autofocus" required = "required">
                    
                </div>
                
                <div>
                
                    <label for = "itemName"> Item Name : </label>
                
                </div>
                
                <div>
                    
                    <input type = "text" id = "itemName" name = "itemName" class = "inputFields">
                    
                </div>
                
                <div>
                
                    <label for = "itemDescription"> Description : </label>
                
                </div>
                    
                <div>
                
                    <input type = "text" id = "itemDescription" name = "itemDescription" class = "inputFields inputDescriptionField">
                                
                </div>
                
                <div>
                
                    <label for = "itemUnits"> Units : </label>
                    
                </div>
                
                <div>
                    
                    <input type = "number" id = "itemUnits" name = "itemUnits" class = "inputFields">
                    
                </div>
                
                <div>
                    
                    <label for = "itemPackaging"> Packaging : </label>
                
                </div>        
                
                <div>
                    
                    <input type = "text" id = "itemPackaging" name = "itemPackaging" class = "inputFields">
                    
                </div>
                
                <div>
                
                    <label for = "itemPrice"> Price : </label>
                    
                </div>
                
                <div>
                    
                    <input type = "number" id = "itemPrice" name = "itemPrice" class = "inputFields" step="any">
                    
                </div>
                
                
                <div>
                
                    <label for  = "inputFile"> Item Image : </label>
                    
                </div>
                
                <div>
                
                    <input type = "hidden" name = "MAX_FILE_SIZE" value = "524288">
                
                </div>
                
                <div>
                
                    <input type = "file" id = "inputFile" name = "inputFile" class = "inputFields chooseFile">
                    
                </div>
                
                <fieldset>

                        <legend> Category (Check all that apply): </legend>

                        <div>

                            <input type = "checkbox" id = "itemCategory" name = "itemCategory" class = "inputFields inputCheckBoxes" value="Category_1">

                            <label for = "iemCategory">Category 1</label>

                        </div>

                        <div>

                            <input type = "checkbox" id = "itemCategory" name = "itemCategory" class = "inputFields inputCheckBoxes" value = "Category_2">

                            <label for = "itemCategory">Category 2</label>

                        </div>
                    
                </fieldset>
                
                <div>
                
                    <input type = "submit" value="SUBMIT" id = "submitBtn" class = "button" name = "submitBtn">
                
                </div>
                    
            </form>
                        
        </div>
        
    </body>
    
    <footer>
    
        
        
    </footer>

</html>
