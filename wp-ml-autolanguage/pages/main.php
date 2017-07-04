<style>
  .mainarea{
    background-color:white;
    border-radius: 10px;
    margin-top:10px;
    padding:8px;
    width:90%;
  }
  .important{
    color:red;
  }
  
  .duplicate-button{
    display:none;
    margin-top:15px;
    text-align:center;
  }
</style>
<div class="mainarea">
    <h1>WP-ML-Language Auto Duplication</h1>
    <p>
      Clicking the following button will go through all posts of this Wordpress Site and complete all the actual languages options. This process
      may take a couple of minutes depending on the number of existing posts stored on the site.
    </p>
    <p class="important">
      Before executing this process, please back up your current database.
    </p>
    <form method="POST" action="#">
      <input type="hidden" value="wpautolanguage_update" name="action" />
      <div class="form-control">
        <input type="checkbox" name="understand" id="understand" value="1" /> I understand what this process does and I promise I will be careful
      </div>
      <div class="form-control duplicate-button">
        <input type="submit" value="Auto Duplicate" />
      </div>
    </form>
</div>

<script type="text/javascript">
  jQuery("#understand").change(function() {
    if(this.checked) {
        jQuery(".duplicate-button").fadeIn();
    }else{
        jQuery(".duplicate-button").fadeOut();
    }
});
</script>