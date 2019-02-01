function get(column){
  fetch('http://localhost/php/colors_alerts/query.php')
  .then(resultset=>resultset.json())
  .then(resultset=>{
    
    console.log(resultset)
    var result = document.getElementById(column);
    var col = document.getElementById('color');
    var des = document.getElementById('description');
    col.innerHTML = '';
    des.innerHTML = '';
    for(let data of resultset){
      if(column=='color')
        result.innerHTML += `
        <li class='mt-2 ml-3'>Color: ${data.color}</li>
        `;
      else
        result.innerHTML += `
        <li class='mt-2' ml-3>${data.description}</li>
        `;
    }


  })
}