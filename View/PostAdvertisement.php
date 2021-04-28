<body>
        
        <header>Post Advertisement</header>
        <span class="close">&times;</span>
        <br><br>
        <form id="pform" class="pform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
        <label for="name">Flat Name</label>&nbsp(<span id="nameErr"></span>)<br>
        <input type="text" id="name" name="name" value="" onkeyup="err(this)"><br> 
        <label for="locations">Location</label>
        <select name="locations" id="locations" onchange="change()">
                <option value="" selected></option>
                <option value="Bashundhara">Bashundhara</option>
                <option value="Baridhara">Baridhara</option>
                <option value="Rampura">Rampura</option>
                <option value="Mohakhali">Mohakhali</option>
                <option value="Badda">Badda</option>
                <option value="Nikunja">Nikunja</option>
                <option value="Malibag">Malibag</option>
        </select>
        <input class="address" type="text" id="address" name="address" value="Enter Address" onfocus="reSet(this)" onblur="reSet(this)" style="width:33.7%"><span id="locErr">&nbsp</span>
        <br>
        <label for="rent">Rent</label>&nbsp(<span id="rentErr"></span>)<br>
        <input type="text" id="rent" name="rent" value="" style="width:48.5%" onkeyup="err(this)">Tk<br> 
        <label for="description">Description</label>&nbsp(<span id="descriptionErr"></span>)<br>
        <textarea id="description" name="description" rows="4" cols="75" value="" style="resize: none;" onkeyup="err(this)"></textarea>
        <br><br>
        <input type="submit" value="Create" id="PostAd" name="PostAd" class="button" style="width:15%; padding: 7.5px">
        <input type="reset" class="button" style="width:15%; padding: 7.5px" >
        </form>
        
        <footer>All Rights Reserved &copy</footer>
        <script src="../Scripts/PostAdvertisementHandler.js"></script>

</body>