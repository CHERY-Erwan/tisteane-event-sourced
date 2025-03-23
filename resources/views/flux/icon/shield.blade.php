@php $attributes = $unescapedForwardedAttributes ?? $attributes; @endphp

@props([
    'variant' => 'outline',
])

@php
$classes = Flux::classes('shrink-0')
    ->add(match($variant) {
        'outline' => '[:where(&)]:size-6',
        'solid' => '[:where(&)]:size-6',
        'mini' => '[:where(&)]:size-5',
        'micro' => '[:where(&)]:size-4',
    });
@endphp

<svg {{ $attributes->class($classes) }} data-flux-icon aria-hidden="true" width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.7259 6.0362C0.665663 6.02813 0.604427 6.03201 0.54569 6.04762C0.486953 6.06322 0.431866 6.09025 0.383578 6.12715C0.33529 6.16406 0.294747 6.21011 0.264265 6.26269C0.233784 6.31527 0.213961 6.37334 0.20593 6.43358C-0.120208 8.87198 -0.508798 15.125 2.91449 20.5288C2.947 20.5801 2.98929 20.6245 3.03896 20.6595C3.08863 20.6945 3.14471 20.7194 3.20399 20.7327C3.26327 20.746 3.3246 20.7475 3.38446 20.7371C3.44433 20.7267 3.50156 20.7047 3.55289 20.6722C3.60423 20.6397 3.64866 20.5974 3.68364 20.5477C3.71863 20.498 3.7435 20.4419 3.75681 20.3827C3.77013 20.3234 3.77164 20.2621 3.76126 20.2022C3.75087 20.1423 3.7288 20.0851 3.6963 20.0338C0.43492 14.8877 0.810095 8.89419 1.12235 6.55617C1.13866 6.43466 1.10607 6.31164 1.03173 6.21414C0.957397 6.11664 0.847396 6.05264 0.7259 6.0362Z" fill="currentColor"/>
    <path d="M24.5134 4.91017C22.8326 4.61764 21.1859 4.15496 19.5986 3.52929C17.5225 2.70755 15.5648 1.6133 13.7772 0.27531C13.5396 0.0966235 13.2504 0 12.9531 0C12.6558 0 12.3665 0.0966235 12.1289 0.27531C11.2383 0.941546 10.305 1.54856 9.33478 2.09243C9.28166 2.12209 9.2349 2.16193 9.1972 2.20968C9.15949 2.25744 9.13158 2.31216 9.11505 2.37071C9.09852 2.42927 9.09371 2.49051 9.10089 2.55093C9.10806 2.61135 9.12709 2.66976 9.15687 2.72281C9.18665 2.77587 9.22661 2.82253 9.27445 2.86012C9.32229 2.89771 9.37708 2.9255 9.43568 2.94188C9.49427 2.95827 9.55553 2.96293 9.61593 2.95561C9.67633 2.94829 9.73469 2.92913 9.78768 2.89922C10.7939 2.33407 11.7619 1.70342 12.6854 1.01132C12.7623 0.952273 12.8564 0.920262 12.9533 0.920262C13.0502 0.920262 13.1443 0.952273 13.2211 1.01132C15.0751 2.39987 17.1055 3.53552 19.2591 4.38835C20.9062 5.03799 22.615 5.51849 24.3593 5.82243C24.4543 5.83854 24.5415 5.88474 24.6081 5.95421C24.6748 6.02368 24.7173 6.11275 24.7294 6.20825C25.0269 8.16322 25.4798 13.2343 23.263 18.0806C23.2365 18.136 23.2214 18.1961 23.2184 18.2573C23.2154 18.3186 23.2246 18.3799 23.2455 18.4376C23.2665 18.4953 23.2987 18.5482 23.3402 18.5933C23.3818 18.6385 23.432 18.6749 23.4877 18.7004C23.5435 18.726 23.6038 18.7402 23.6652 18.7422C23.7265 18.7443 23.7876 18.7341 23.845 18.7122C23.9023 18.6904 23.9548 18.6574 23.9992 18.6151C24.0437 18.5728 24.0793 18.5221 24.104 18.4659C26.4249 13.3925 25.9544 8.10632 25.6445 6.06808C25.6025 5.7803 25.4704 5.51322 25.2672 5.30518C25.064 5.09715 24.8001 4.95886 24.5134 4.91017Z" fill="currentColor"/>
    <path d="M12.5073 24.4359C12.6504 24.4883 12.8014 24.5154 12.9538 24.5159C13.1037 24.5157 13.2524 24.4893 13.3932 24.4377C14.0315 24.2132 14.6537 23.9457 15.2557 23.6369C15.3097 23.6091 15.3578 23.5709 15.397 23.5245C15.4363 23.4782 15.4661 23.4245 15.4846 23.3666C15.5031 23.3087 15.5101 23.2478 15.5051 23.1872C15.5 23.1266 15.4831 23.0676 15.4553 23.0136C15.4275 22.9595 15.3893 22.9115 15.3429 22.8722C15.2965 22.833 15.2429 22.8032 15.185 22.7847C15.1271 22.7661 15.0661 22.7592 15.0055 22.7642C14.945 22.7692 14.886 22.7861 14.832 22.814C14.2661 23.1049 13.6811 23.3568 13.081 23.568C12.997 23.6009 12.9036 23.6009 12.8196 23.568C10.7456 22.8575 8.88148 21.641 7.396 20.0286C3.90425 16.2209 3.59661 11.123 3.72337 8.4329C3.72771 8.3612 3.74577 8.291 3.77657 8.22611C3.82137 8.11691 3.82275 7.99471 3.7804 7.88453C3.73805 7.77435 3.65519 7.68453 3.54877 7.63345C3.44236 7.58237 3.32044 7.5739 3.20799 7.60977C3.09554 7.64565 3.00105 7.72315 2.94387 7.82642C2.8614 8.00065 2.81319 8.18912 2.80185 8.38155C2.6677 11.2252 2.998 16.6016 6.71597 20.6559C8.30232 22.3776 10.2928 23.6767 12.5073 24.4359Z" fill="currentColor"/>
    <path d="M21.4534 16.189C21.5041 16.208 21.5579 16.2177 21.612 16.2177C21.7069 16.2177 21.7994 16.1885 21.8771 16.1341C21.9548 16.0798 22.0139 16.0028 22.0464 15.9138C22.8892 13.4958 23.2491 10.9359 23.1058 8.37929C23.0969 8.19232 23.051 8.00898 22.9708 7.83985C22.8906 7.67072 22.7777 7.51916 22.6386 7.39394C22.5945 7.34835 22.5415 7.3123 22.4829 7.28805C22.4243 7.2638 22.3613 7.25186 22.2979 7.25297C22.2345 7.25408 22.172 7.26821 22.1143 7.2945C22.0566 7.32078 22.0049 7.35865 21.9624 7.40576C21.9199 7.45286 21.8876 7.5082 21.8674 7.56832C21.8473 7.62845 21.8397 7.69208 21.8451 7.75527C21.8506 7.81845 21.8689 7.87984 21.8991 7.93562C21.9293 7.9914 21.9706 8.04038 22.0205 8.07952C22.0689 8.12343 22.1082 8.1765 22.1359 8.23565C22.1637 8.2948 22.1795 8.35887 22.1824 8.42416C22.3201 10.8569 21.9792 13.2931 21.179 15.5946C21.158 15.6516 21.1484 15.7123 21.1507 15.773C21.1531 15.8338 21.1675 15.8935 21.193 15.9487C21.2184 16.0039 21.2546 16.0535 21.2992 16.0948C21.3439 16.136 21.3963 16.168 21.4534 16.189Z" fill="currentColor"/>
    <path d="M12.7741 4.19921C12.8395 4.16949 12.9113 4.15671 12.983 4.16204C13.0546 4.16738 13.1237 4.19066 13.184 4.22974C14.5156 5.08923 15.9173 5.83482 17.3743 6.45858C17.4862 6.50233 17.6108 6.50081 17.7216 6.45434C17.8324 6.40788 17.9208 6.32011 17.9681 6.20961C18.0153 6.09912 18.0177 5.97458 17.9747 5.86235C17.9318 5.75012 17.8468 5.65901 17.7379 5.60831C16.3288 5.00444 14.973 4.283 13.685 3.45163C13.4961 3.33003 13.2799 3.25732 13.0559 3.24004C12.8319 3.22276 12.6071 3.26145 12.4017 3.35263C12.2958 3.40574 12.2143 3.49746 12.174 3.60887C12.1338 3.72028 12.1378 3.84291 12.1852 3.95146C12.2327 4.06001 12.32 4.14622 12.4291 4.19232C12.5382 4.23841 12.6609 4.24088 12.7718 4.19921H12.7741Z" fill="currentColor"/>
    <path d="M20.1186 7.48035C20.1618 7.49336 20.2067 7.49991 20.2518 7.49978C20.3628 7.4997 20.4702 7.45967 20.5541 7.38701C20.6381 7.31436 20.6931 7.21392 20.7092 7.10404C20.7252 6.99416 20.7012 6.88217 20.6416 6.78853C20.5819 6.69489 20.4905 6.62584 20.3841 6.594C20.1607 6.52692 19.9377 6.45105 19.7143 6.37056C19.5988 6.32896 19.4716 6.33494 19.3605 6.38717C19.2495 6.43939 19.1637 6.53359 19.1221 6.64905C19.0805 6.7645 19.0865 6.89175 19.1387 7.00279C19.1909 7.11384 19.2852 7.19959 19.4006 7.24118C19.6402 7.32723 19.8794 7.40865 20.1186 7.48035Z" fill="currentColor"/>
    <path d="M10.4598 12.7107C10.1849 12.4413 9.81525 12.2904 9.4303 12.2904C9.04535 12.2904 8.67574 12.4413 8.40077 12.7107L7.82158 13.3015C7.55208 13.5794 7.40137 13.9514 7.40137 14.3386C7.40137 14.7258 7.55208 15.0978 7.82158 15.3758L11.3661 18.9929C11.5 19.1304 11.66 19.2396 11.8368 19.3142C12.0136 19.3888 12.2035 19.4272 12.3954 19.4272C12.5873 19.4272 12.7772 19.3888 12.954 19.3142C13.1308 19.2396 13.2908 19.1304 13.4247 18.9929L19.9345 12.3494C20.204 12.0714 20.3547 11.6994 20.3547 11.3122C20.3547 10.9251 20.204 10.5531 19.9345 10.2751L19.3553 9.68433C19.2217 9.54658 19.0618 9.43713 18.8851 9.36251C18.7083 9.28788 18.5183 9.24959 18.3265 9.24994C18.1345 9.24958 17.9443 9.28784 17.7674 9.36247C17.5905 9.4371 17.4304 9.54656 17.2967 9.68433L12.7632 14.3104C12.6651 14.4074 12.5328 14.4617 12.3949 14.4617C12.257 14.4617 12.1247 14.4074 12.0267 14.3104L10.4598 12.7107ZM13.4247 14.9576L17.9582 10.3315C18.006 10.282 18.0632 10.2427 18.1265 10.2158C18.1898 10.1889 18.2579 10.1751 18.3267 10.1751C18.3955 10.1751 18.4635 10.1889 18.5269 10.2158C18.5902 10.2427 18.6474 10.282 18.6952 10.3315L19.2743 10.9227C19.3756 11.0271 19.4323 11.1668 19.4323 11.3122C19.4323 11.4577 19.3756 11.5974 19.2743 11.7018L12.7636 18.3457C12.6656 18.4427 12.5333 18.4971 12.3954 18.4971C12.2575 18.4971 12.1252 18.4427 12.0271 18.3457L8.48265 14.7281C8.38136 14.6238 8.32471 14.4841 8.32471 14.3386C8.32471 14.1932 8.38136 14.0535 8.48265 13.9491L9.06183 13.3579C9.16001 13.261 9.29238 13.2067 9.4303 13.2067C9.56822 13.2067 9.70059 13.261 9.79877 13.3579L11.3661 14.9576C11.641 15.2269 12.0105 15.3777 12.3954 15.3777C12.7802 15.3777 13.1497 15.2269 13.4247 14.9576Z" fill="currentColor"/>
    <path d="M2.31348 5.54907C2.31353 5.6572 2.35146 5.76189 2.42067 5.84496C2.48988 5.92804 2.58601 5.98424 2.69235 6.00381C5.62574 6.54414 5.94448 6.86287 6.48573 9.79719C6.50555 9.90331 6.56186 9.99916 6.64491 10.0681C6.72796 10.1371 6.83252 10.1749 6.94047 10.1749C7.04843 10.1749 7.15299 10.1371 7.23603 10.0681C7.31908 9.99916 7.37539 9.90331 7.39522 9.79719C7.93554 6.8638 8.25428 6.54506 11.1886 6.00381C11.2947 5.98399 11.3906 5.92768 11.4595 5.84463C11.5285 5.76158 11.5663 5.65703 11.5663 5.54907C11.5663 5.44111 11.5285 5.33656 11.4595 5.25351C11.3906 5.17046 11.2947 5.11415 11.1886 5.09433C8.2552 4.554 7.93647 4.23527 7.39522 1.30095C7.37539 1.19483 7.31908 1.09898 7.23603 1.03001C7.15299 0.961035 7.04843 0.923279 6.94047 0.923279C6.83252 0.923279 6.72796 0.961035 6.64491 1.03001C6.56186 1.09898 6.50555 1.19483 6.48573 1.30095C5.9454 4.23434 5.62667 4.55308 2.69235 5.09433C2.58601 5.1139 2.48988 5.1701 2.42067 5.25317C2.35146 5.33625 2.31353 5.44094 2.31348 5.54907ZM6.93955 3.37065C7.07693 3.89428 7.35106 4.37197 7.73386 4.75476C8.11665 5.13755 8.59434 5.41169 9.11796 5.54907C8.59434 5.68645 8.11665 5.96059 7.73386 6.34338C7.35106 6.72617 7.07693 7.20386 6.93955 7.72749C6.80217 7.20386 6.52803 6.72617 6.14524 6.34338C5.76245 5.96059 5.28476 5.68645 4.76113 5.54907C5.28476 5.41169 5.76245 5.13755 6.14524 4.75476C6.52803 4.37197 6.80217 3.89428 6.93955 3.37065Z" fill="currentColor"/>
    <path d="M25.5272 21.748C22.5938 21.2077 22.2751 20.889 21.7339 17.9547C21.714 17.8485 21.6577 17.7527 21.5747 17.6837C21.4916 17.6148 21.3871 17.577 21.2791 17.577C21.1712 17.577 21.0666 17.6148 20.9836 17.6837C20.9005 17.7527 20.8442 17.8485 20.8244 17.9547C20.284 20.8881 19.9653 21.2068 17.031 21.748C16.9249 21.7679 16.829 21.8242 16.76 21.9072C16.6911 21.9903 16.6533 22.0948 16.6533 22.2028C16.6533 22.3107 16.6911 22.4153 16.76 22.4983C16.829 22.5814 16.9249 22.6377 17.031 22.6575C19.9644 23.1979 20.2831 23.5166 20.8244 26.4509C20.8442 26.557 20.9005 26.6529 20.9836 26.7218C21.0666 26.7908 21.1712 26.8286 21.2791 26.8286C21.3871 26.8286 21.4916 26.7908 21.5747 26.7218C21.6577 26.6529 21.714 26.557 21.7339 26.4509C22.2742 23.5175 22.5929 23.1988 25.5272 22.6575C25.6334 22.6377 25.7292 22.5814 25.7982 22.4983C25.8671 22.4153 25.9049 22.3107 25.9049 22.2028C25.9049 22.0948 25.8671 21.9903 25.7982 21.9072C25.7292 21.8242 25.6334 21.7679 25.5272 21.748ZM21.28 24.3812C21.1427 23.8576 20.8685 23.3799 20.4857 22.9971C20.1029 22.6143 19.6252 22.3402 19.1016 22.2028C19.6252 22.0654 20.1029 21.7913 20.4857 21.4085C20.8685 21.0257 21.1427 20.548 21.28 20.0244C21.4174 20.548 21.6916 21.0257 22.0743 21.4085C22.4571 21.7913 22.9348 22.0654 23.4585 22.2028C22.9348 22.3402 22.4571 22.6143 22.0743 22.9971C21.6916 23.3799 21.4174 23.8576 21.28 24.3812Z" fill="currentColor"/>
</svg>
