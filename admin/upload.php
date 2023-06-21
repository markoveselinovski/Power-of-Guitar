<!DOCTYPE html>
<html>
<?php 
    include("header.php"); 
	if(!isset($_SESSION['user']))
	{
			header("Location: logout.php");
	}
	else
	{	
?>
    <body>
        <div class="container pt-5">
            <div class="d-flex justify-content-center">                
                <form role="form" method="post" action="transac.php?action=upload_image&type=photo1" enctype="multipart/form-data">
                    <h3 class="text-success">Upload Photo 1</h3>
                    <div class="form-group">
                            <input type="hidden" name="pid" value="<?php echo $_GET['pid']?>">
                            <input class="text-warning" type="file" name='fileToUpload' id="fileToUpload">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Save Image <i class="fas fa-save"></i></button>
                    <button type="reset" class="btn btn-outline-info">Reset <i class="fas fa-redo-alt"></i></button>
                </form>

                </form>
            </div>
        </div>
        <div class="container pt-5">
            <div class="d-flex justify-content-center">
                <form role="form" method="post" action="transac.php?action=upload_image&type=photo2" enctype="multipart/form-data">
                    <h3 class="text-success">Upload Photo 2</h3>
                    <div class="form-group">
                            <input type="hidden" name="pid" value="<?php echo $_GET['pid']?>">
                            <input class="text-warning" type="file" name='fileToUpload' id="fileToUpload">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Save Image <i class="fas fa-save"></i></button>
                    <button type="reset" class="btn btn-outline-info">Reset <i class="fas fa-redo-alt"></i></button>
                </form>

                </form>
            </div>
        </div>
    </body>

<?php 
    }//close admin check
    include("footer.php");
?>
</html>