let navbar = document.querySelector('#navbar-menu');
let accountBox = document.querySelector('#account-box');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('hidden');
   navbar.classList.toggle('flex');
   navbar.classList.toggle('flex-col');
   navbar.classList.toggle('absolute');
   navbar.classList.toggle('top-full');
   navbar.classList.toggle('left-0');
   navbar.classList.toggle('right-0');
   navbar.classList.toggle('bg-white');
   navbar.classList.toggle('border-t');
   navbar.classList.toggle('p-4');
   navbar.classList.toggle('shadow-lg');
   
   accountBox.classList.add('hidden');
   accountBox.classList.remove('active'); // Keep for safety if anything else uses it
}

document.querySelector('#user-btn').onclick = () =>{
   accountBox.classList.toggle('hidden');
   accountBox.classList.toggle('scale-100');
   accountBox.classList.toggle('scale-0');
   
   navbar.classList.add('hidden');
   navbar.classList.remove('flex'); // Reset navbar state
}

window.onscroll = () =>{
   navbar.classList.add('hidden');
   navbar.classList.remove('flex');
   
   accountBox.classList.add('hidden');
   accountBox.classList.remove('scale-100');
   accountBox.classList.add('scale-0');
}
