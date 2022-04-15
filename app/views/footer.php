

<script src="<?= BASE_URL ?>/style/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>/style/js/index.js"></script>
<script>
    const formComment = document.getElementById("formComment");
    function showFormComment(){
      formComment.style.display = "flex";
    }
    function hideFormComment(){
      formComment.style.display = "none";
    }


    function hideModal(){
      document.getElementsByClassName('modal-background')[0].style.display = "none";
    }
    document.querySelector('.first-button').addEventListener('click', function () {
      
      if(document.querySelector('.side-bar').style.display == 'flex'){
        document.querySelector('.side-bar').style.display = "none";
      }
      else{
        document.querySelector('.side-bar').style.display = "flex";
      }
      
    });
  window.addEventListener('resize', function(event) {
    console.log(window.screen.width);
    if(window.screen.width > 576){
      document.querySelector('.side-bar').style.display = "flex";
    }
    else{
      document.querySelector('.side-bar').style.display = "none";
    }
  }, true);
  </script>
</body>
</html>