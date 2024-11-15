function addStudent(){
    let txtFirstName=document.getElementById('firstName'); 
    let txtLastName=document.getElementById('lastName');
    let txtEmail=document.getElementById('email');

    let tbody=document.getElementsByTagName('tbody')[0];
    let tr=document.createElement('tr');

    let td1=document.createElement('td');
    td1.innerText=txtFirstName.value;
    tr.appendChild(td1);

    let td2=document.createElement('td');
    td2.innerText=txtLastName.value;
    tr.appendChild(td2);

    let td3=document.createElement('td');   
    td3.innerText=txtEmail.value;
    tr.appendChild(td3);

    let td4=document.createElement('td');
    //td4.innerText='<button class="btn btn-danger btn-sm">Delete</button>';
    td4.innerHTML='<button onclick="removeStudent(this)" class="btn btn-danger btn-sm">Delete</button>';
    tr.appendChild(td4);


    tbody.appendChild(tr);
}

function removeStudent(btn){   
    let td=btn.parentElement;
    let tr=td.parentElement;
    tr.remove();
}