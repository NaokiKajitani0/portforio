'use strict';

{
  const open1=document.getElementById('open1');
  const open2=document.getElementById('open2');
  const open3=document.getElementById('open3');

  const educationcareer=document.getElementById('educationcareer');
  const jobcareer=document.getElementById('jobcareer');
  const others=document.getElementById('others');

  const close1=document.getElementById('close1');
  const close2=document.getElementById('close2');
  const close3=document.getElementById('close3');
  
  const mask=document.getElementById('mask');

  open1.addEventListener('click',()=>{
    educationcareer.classList.remove('hidden');
    mask.classList.remove('hidden');
  });
  close1.addEventListener('click',()=>{
    educationcareer.classList.add('hidden');
    mask.classList.add('hidden');
  });

  open2.addEventListener('click',()=>{
    jobcareer.classList.remove('hidden');
    mask.classList.remove('hidden');
  });
  close2.addEventListener('click',()=>{
    jobcareer.classList.add('hidden');
    mask.classList.add('hidden');
  });

  open3.addEventListener('click',()=>{
    others.classList.remove('hidden');
    mask.classList.remove('hidden');
  });
  close3.addEventListener('click',()=>{
    others.classList.add('hidden');
    mask.classList.add('hidden');
  });
  const menuItems=document.querySelectorAll('.menu li a');
  const contents=document.querySelectorAll('.content');

  menuItems.forEach(item=>{
    item.addEventListener('click',e=>{
      e.preventDefault();

      menuItems.forEach(item=>{
        item.classList.remove('active');
      });
      item.classList.add('active');

      contents.forEach(content=>{
        content.classList.remove('active');
      });
      document.getElementById(item.dataset.id).classList.add('active');
    });
    
  });
}