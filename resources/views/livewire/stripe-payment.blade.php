 <x-slot name="header">
     <x-slot name="title">
         {{ __('Formulario de Pago') }}
     </x-slot>
     <div class="bg-white p-4 flex items-center flex-wrap font-bold">
         <ul class="flex items-center">
             <li class="inline-flex items-center">
                 <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-500">
                     <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24" fill="#000000">
                         <path d="M0 0h24v24H0V0z" fill="none" />
                         <path
                             d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z" />
                     </svg>
                 </a>

                 <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24">
                     <path d="M0 0h24v24H0V0z" fill="none" />
                     <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z" />
                 </svg>
             </li>

             <li class="inline-flex items-center">
                 <a href="{{ route('solutions') }}" class="text-gray-600 hover:text-green-500">
                     {{ __('Adquirir Plan Premiun Anuncio Destacado') }}
                 </a>


             </li>


         </ul>
     </div>
 </x-slot>

 <div class="max-w-7xl mx-auto py-12">

     <!--INCLUDE ALERTS MESSAGES-->

     <x-message-success />


     <!-- END INCLUDE ALERTS MESSAGES-->

     <form wire:submit.prevent="processPayment" id="card-form">
         @csrf
         <div class="mb-3">
             <label for="card-name" class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Your
                 name</label>
             <input type="text" wire:model="name" name="name" id="card-name"
                 class="border-2 border-gray-200 h-11 px-4 rounded-xl w-full">
         </div>
         <div class="mb-3">
             <label for="email" class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Email</label>
             <input type="email" wire:model="email" name="email" id="email"
                 class="border-2 border-gray-200 h-11 px-4 rounded-xl w-full">
         </div>
         <div class="mb-3">
             <label for="card" class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Card
                 details</label>

             <div class="bg-gray-100 p-6 rounded-xl">
                 <div id="card"></div>
             </div>
         </div>
         <button type="submit"
             class="w-full bg-indigo-500 uppercase rounded-xl font-extrabold text-white px-6 h-12">Pay 👉</button>
     </form>


 </div>

 @push('js')
     <script src="https://js.stripe.com/v3/"></script>
     <script>
         let stripe = Stripe('{{ env('STRIPE_KEY') }}')
         const elements = stripe.elements()
         const cardElement = elements.create('card', {
             style: {
                 base: {
                     fontSize: '16px'
                 }
             }
         })
         const cardForm = document.getElementById('card-form')
         const cardName = document.getElementById('card-name')
         cardElement.mount('#card')
         cardForm.addEventListener('submit', async (e) => {
             e.preventDefault()
             const {
                 paymentMethod,
                 error
             } = await stripe.createPaymentMethod({
                 type: 'card',
                 card: cardElement,
                 billing_details: {
                     name: cardName.value
                 }
             })
             if (error) {
                 console.log(error)
             } else {
                 let input = document.createElement('input')
                 input.setAttribute('type', 'hidden')
                 input.setAttribute('name', 'payment_method')
                 input.setAttribute('value', paymentMethod.id)
                 cardForm.appendChild(input)
                 cardForm.submit()
             }
         })
     </script>
 @endpush
