<?php
//funciones
function pintar($texto1,$texto2){
        print <<<EOT
        <form action="" method="post">
            <textarea name="textarea1" id="textarea1" cols="30" rows="10">$texto1</textarea>
            <textarea name="textarea2" id="textarea2" cols="30" rows="10">$texto2</textarea>
            <div class="textarea" contenteditable>$texto2</div>
            <button style="" name="Remark" id="Remark">Remark</button>
            <button style="" name="Remove" id="Remove">Remove</button>
            <button style="" name="Replace" id="Replace">Replace</button>
            <input inputype="text" name="textarea3" id="textarea3"></input>
            <button style="" name="words" id="words">Count words</button>
            <button style="" name="vowels" id="vowels">Count vowels</button>
            <button style="" name="Lower" id="Lower">Lower case</button>
            <button style="" name="Upper" id="Upper">Upper case</button>
            <button style="" name="Refresh" id="Refresh">Refresh</button>
        </form>
        EOT;
    }  
    
function Remarcar($texto1,$texto2){
    $final=str_replace($texto1,"<mark>$texto1</mark>",$texto2);
    pintar($texto1,$final);
}
function Borrar($texto1,$texto2){
    $final=str_replace($texto1,"",$texto2);
    pintar($texto1,$final);
}
function Remplazar($texto1,$texto2,$texto3){
    $final=str_replace($texto1,$texto3,$texto2);
    pintar($texto1,$final);
}
function Palabras($texto1,$texto2){
    $final=str_word_count($texto2);
    pintar($texto1,$final);
}
function Letras($texto1,$texto2){
    $final=preg_match_all('/[aeiou]/i', $texto2);
    pintar($texto1,$final);
}
function Mayusculas($texto1,$texto2){
    $final=strtoupper($texto2);
    pintar($texto1,$final);
}
function Minusculas($texto1,$texto2){
    $final=strtolower($texto2);
    pintar($texto1,$final);
}


?>