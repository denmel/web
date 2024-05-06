let btn_add = document.getElementById('btn_add');
btn_add.addEventListener('click', ()=>{
   window.location.href = btn_add.getAttribute('action');
});

let list = document.getElementsByClassName('list')[0].tBodies[0];
list.addEventListener('click', (e)=>{
    e.target.closest('tr').classList.toggle('selected');
});

let btn_del = document.getElementById('btn_del');
btn_del.addEventListener('click', ()=>{
   let ids = {ids:[]};
   Array.from(list.getElementsByClassName('selected')).forEach(row=>{
      ids['ids'].push(row.dataset.id);
   });
   fetch(btn_del.getAttribute('action'), {
      method: 'POST',
      body: JSON.stringify(ids)
   }).then(response => response.json())
       .then(result=>{
          window.location.reload();
          alert('Удалено записей: ' + result['count']);
       });
});

let btn_upd = document.getElementById('btn_upd');
btn_upd.addEventListener("click",()=>{
    let ids = {ids:[]};
    Array.from(list.getElementsByClassName('selected')).forEach(row=>{
        ids['ids'].push(row.dataset.id);
    });
    window.location.href = btn_upd.getAttribute('action')+'/'+ids['ids'][0];
});