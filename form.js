function addNewField1() {
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('weField');
    newNode.setAttribute('rows', 3);
    newNode.classList.add('mt-2')
  
    let weOb = document.getElementById('we');
    let weAddButtonOb = document.getElementById('weAddButton');
  
    weOb.insertBefore(newNode, weAddButtonOb);
  }
  function addNewField2() {
    let newNode = document.createElement('textarea');
    newNode.classList.add('form-control');
    newNode.classList.add('eqField');
    newNode.setAttribute('rows', 3);
    newNode.classList.add('mt-2')
  
    let edOb = document.getElementById('aq');
    let edAddButtonOb = document.getElementById('aqAddButton');
  
    edOb.insertBefore(newNode, edAddButtonOb);
  }
  
  function Generateresume() {
  
    //name field
    let namefeild = document.getElementById('namefeild').value;
    let nameT1 = document.getElementById('nameT1');
  
    nameT1.innerHTML = namefeild;
    document.getElementById('nameT2').innerHTML= namefeild;
  
    //contact field
    document.getElementById('contactT').innerHTML = document.getElementById('contactfield').value;
  
    //email field
    document.getElementById('emailT').innerHTML = document.getElementById('emailfield').value;
  
    //address field
    document.getElementById('addressT').innerHTML = document.getElementById('addressfield').value;
  
    //linkedin field
    document.getElementById('linkT').innerHTML = document.getElementById('linkfeild').value;
  
    //Insta field
    document.getElementById('instaT').innerHTML = document.getElementById('instafeild').value;
  
    //fb field
    document.getElementById('fbT').innerHTML = document.getElementById('facefeild').value;
  
  
    //objective field
    document.getElementById('objectiveT').innerHTML = document.getElementById('objectivefeild').value;
  
    //work exp
    let workExps = document.getElementsByClassName('weField'); //getting obj of weField
    let str = ''
  
    for(let e of workExps) {
        str = str + `<li> ${e.value} </li>`
    }
    document.getElementById('weT').innerHTML = str;
  
    //academic_qualification
    let sa = document.getElementsByClassName("eqField"); //getting obj of weField
    let str1 = ''
  
    for(let e of sa) {
        str1 = str1 + `<li> ${e.value} </li>`
    }
    document.getElementById('aqT').innerHTML = str1;
  
    //Image field
    let file = document.getElementById('imgField').files[0]; //getting first(index at 0) file
    console.log(file);
    let reader = new FileReader();
  
    reader.readAsDataURL(file);
    
    console.log(reader.result);
    
    //set the image to template
    reader.onloadend = function () {
        document.getElementById('imgT').src = reader.result;
    };
  
    document.getElementById('resume-form').style.display = 'none';
    document.getElementById('resume-template').style.display = 'block';
  
   
  
  }
  
  
  function printresume(){
    window.print();
  }