import './bootstrap';
import { livewire_hot_reload } from 'virtual:livewire-hot-reload'
livewire_hot_reload();

import Alpine from 'alpinejs';

window.Alpine = Alpine;

import intersect from '@alpinejs/intersect'

Alpine.plugin(intersect)
Alpine.start();

import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
// import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Swiper = Swiper;
window.Navigation = Navigation;
window.Pagination = Pagination;


// Swiperの設定はbladeに直接記載するので以下は不要
// // init Swiper:
// const swiper = new Swiper('.swiper', {
//     // configure Swiper to use modules
//     modules: [Navigation, Pagination],
//     // pagination設定
//     pagination: {
//         el: '.swiper-pagination',
//     },
//     // navigation設定
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
// });
