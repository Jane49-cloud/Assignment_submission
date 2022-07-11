
    var deadline1 = document.getElementById("deadline1");
    var deadline2 = document.getElementById("deadline2");
    var deadline3 = document.getElementById("deadline3");
    var deadline4 = document.getElementById("deadline4");
    var countDownDate = new Date('<?php echo $datD ?>').getTime()
    
    var myfunc = setInterval(function() {
      // code goes here
    var now =   new Date().getTime()
    
    var timeleft = countDownDate - now;
    if (timeleft<0){
        timeleft = 0;
    
    
    var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
    
    
    deadline1.innerHTML = days + " D" ;
    deadline2.innerHTML = hours + " H" ;
    deadline3.innerHTML = minutes + " M"  ;
    deadline4.innerHTML = seconds + " S"  ;
    
    }else{
    var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
    
    
    deadline1.innerHTML = days + " D" ;
    deadline2.innerHTML = hours + " H" ;
    deadline3.innerHTML = minutes + " M"  ;
    deadline4.innerHTML = seconds + " S"  ;
    }
      }, 1000)
