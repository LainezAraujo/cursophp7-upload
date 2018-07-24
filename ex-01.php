<form method="POST" enctype="multipart/form-data">
	
	<input type="file" name="fileUpload">

	<button type="submit">Send</button>
</form>
<!--enctype= permite de informação que está enviando.
multipart= dados que fogem do padrão de string, binários, se não colocar o lado do php não funciona. 
clica send método é post (recebe arquivo).
get = $_GET  post = $_POST ==> PARA ARQUIVOS STRING

*****MULTIPART*****
$_FILE pasta temporária no servidor para transferir os pacotes, depois move para o local físico final. Ex:Youtube.-->

<?php 
	if($_SERVER["REQUEST_METHOD"] === "POST"){
		//nome do file
		$file = $_FILES["fileUpload"];

		if($file["error"]){
			throw new Exception("Error: ". $file["error"]);
		}
		$dirUploads="uploads";

		if(!is_dir($dirUploads)){
			mkdir($dirUploads);
	

		if(move_uploaded_file($file["tmp_name"],$dirUploads.DIRECTORY_SEPARATOR. $file["name"])){
		echo "Upload realizado com sucesso!";

		}else{
		throw new Exception("Não foi possível realizar o upload");
		
			}
		}
	}


	//recebe diretório temporário, para onde irá
	

?>