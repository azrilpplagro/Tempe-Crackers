function null_title_value(tag_name) {
  console.log('tes')
  var input = document.getElementsByName(tag_name)[0].value;
  if(input == ""){
    document.getElementsByName(tag_name)[0].classList.add('null-value')
  }
  else{
    document.getElementsByName(tag_name)[0].classList.remove('null-value')
  }
}