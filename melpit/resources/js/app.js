require('./bootstrap');

import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faAddressCard, faClock } from '@fortawesome/free-regular-svg-icons'
import { faSearch, faStoreAlt, faShoppingBag, faSignOutAlt, faYenSign, faCamera } from '@fortawesome/free-solid-svg-icons'

library.add(faSearch, faAddressCard, faStoreAlt, faShoppingBag, faSignOutAlt, faYenSign, faClock, faCamera);

dom.watch();

document.querySelector('.image-picker input')
.addEventListener('change', (e) => {
  const input = e.target;
  const reader = new FileReader();
  reader.onload = (e) => {
    input.closest('.image-picker').querySelector('img').src = e.target.result
  };
  reader.readAsDataURL(input.files[0]);
});
