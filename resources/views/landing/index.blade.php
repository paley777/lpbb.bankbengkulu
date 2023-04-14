@extends('landing.layouts.main')

@section('container')
    <style>
        .magicpattern {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center center;
            background-repeat: repeat;
            /* Create the parallax scrolling effect */
            background-attachment: fixed;

            background-image: url("data:image/svg+xml;utf8,%3Csvg viewBox=%220 0 1500 1100%22 xmlns=%22http:%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cmask id=%22b%22 x=%220%22 y=%220%22 width=%221500%22 height=%221100%22%3E%3Cpath fill=%22url(%23a)%22 d=%22M0 0h1500v1100H0z%22%2F%3E%3C%2Fmask%3E%3Cpath fill=%22%23000336%22 d=%22M0 0h1500v1100H0z%22%2F%3E%3Cg style=%22transform-origin:center center%22 stroke=%22%234c4e72%22 stroke-width=%221.5%22 mask=%22url(%23b)%22%3E%3Cpath fill=%22none%22 d=%22M0 0h75v75H0z%22%2F%3E%3Cpath fill=%22%234c4e72a5%22 d=%22M75 0h75v75H75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M150 0h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e729a%22 d=%22M225 0h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M300 0h75v75h-75zM375 0h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7224%22 d=%22M450 0h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M525 0h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e723f%22 d=%22M600 0h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M675 0h75v75h-75zM750 0h75v75h-75zM825 0h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e722f%22 d=%22M900 0h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M975 0h75v75h-75zM1050 0h75v75h-75zM1125 0h75v75h-75zM1200 0h75v75h-75zM1275 0h75v75h-75zM1350 0h75v75h-75zM1425 0h75v75h-75zM0 75h75v75H0zM75 75h75v75H75zM150 75h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7254%22 d=%22M225 75h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M300 75h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e723d%22 d=%22M375 75h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M450 75h75v75h-75zM525 75h75v75h-75zM600 75h75v75h-75zM675 75h75v75h-75zM750 75h75v75h-75zM825 75h75v75h-75zM900 75h75v75h-75zM975 75h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e720e%22 d=%22M1050 75h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1125 75h75v75h-75zM1200 75h75v75h-75zM1275 75h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72cd%22 d=%22M1350 75h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7257%22 d=%22M1425 75h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72b8%22 d=%22M0 150h75v75H0z%22%2F%3E%3Cpath fill=%22%234c4e7260%22 d=%22M75 150h75v75H75z%22%2F%3E%3Cpath fill=%22%234c4e7287%22 d=%22M150 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72d2%22 d=%22M225 150h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M300 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e729a%22 d=%22M375 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72e1%22 d=%22M450 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e722a%22 d=%22M525 150h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M600 150h75v75h-75zM675 150h75v75h-75zM750 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7206%22 d=%22M825 150h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M900 150h75v75h-75zM975 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72d5%22 d=%22M1050 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72c4%22 d=%22M1125 150h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1200 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e727c%22 d=%22M1275 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e720b%22 d=%22M1350 150h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72b1%22 d=%22M1425 150h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M0 225h75v75H0zM75 225h75v75H75zM150 225h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72e8%22 d=%22M225 225h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7212%22 d=%22M300 225h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M375 225h75v75h-75zM450 225h75v75h-75zM525 225h75v75h-75zM600 225h75v75h-75zM675 225h75v75h-75zM750 225h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72b1%22 d=%22M825 225h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M900 225h75v75h-75zM975 225h75v75h-75zM1050 225h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7295%22 d=%22M1125 225h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1200 225h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e722f%22 d=%22M1275 225h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1350 225h75v75h-75zM1425 225h75v75h-75zM0 300h75v75H0zM75 300h75v75H75z%22%2F%3E%3Cpath fill=%22%234c4e729a%22 d=%22M150 300h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M225 300h75v75h-75zM300 300h75v75h-75zM375 300h75v75h-75zM450 300h75v75h-75zM525 300h75v75h-75zM600 300h75v75h-75zM675 300h75v75h-75zM750 300h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7205%22 d=%22M825 300h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M900 300h75v75h-75zM975 300h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72ce%22 d=%22M1050 300h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7214%22 d=%22M1125 300h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1200 300h75v75h-75zM1275 300h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e727d%22 d=%22M1350 300h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1425 300h75v75h-75zM0 375h75v75H0zM75 375h75v75H75z%22%2F%3E%3Cpath fill=%22%234c4e7223%22 d=%22M150 375h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M225 375h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72db%22 d=%22M300 375h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M375 375h75v75h-75zM450 375h75v75h-75zM525 375h75v75h-75zM600 375h75v75h-75zM675 375h75v75h-75zM750 375h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72c0%22 d=%22M825 375h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e720a%22 d=%22M900 375h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M975 375h75v75h-75zM1050 375h75v75h-75zM1125 375h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e729b%22 d=%22M1200 375h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1275 375h75v75h-75zM1350 375h75v75h-75zM1425 375h75v75h-75zM0 450h75v75H0zM75 450h75v75H75zM150 450h75v75h-75zM225 450h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72b4%22 d=%22M300 450h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72fd%22 d=%22M375 450h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7225%22 d=%22M450 450h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M525 450h75v75h-75zM600 450h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72f1%22 d=%22M675 450h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7264%22 d=%22M750 450h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M825 450h75v75h-75zM900 450h75v75h-75zM975 450h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e729b%22 d=%22M1050 450h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1125 450h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e724e%22 d=%22M1200 450h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1275 450h75v75h-75zM1350 450h75v75h-75zM1425 450h75v75h-75zM0 525h75v75H0z%22%2F%3E%3Cpath fill=%22%234c4e726f%22 d=%22M75 525h75v75H75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M150 525h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72b4%22 d=%22M225 525h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M300 525h75v75h-75zM375 525h75v75h-75zM450 525h75v75h-75zM525 525h75v75h-75zM600 525h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72e0%22 d=%22M675 525h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M750 525h75v75h-75zM825 525h75v75h-75zM900 525h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72ab%22 d=%22M975 525h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1050 525h75v75h-75zM1125 525h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7272%22 d=%22M1200 525h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1275 525h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72e6%22 d=%22M1350 525h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72c1%22 d=%22M1425 525h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M0 600h75v75H0zM75 600h75v75H75zM150 600h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72a8%22 d=%22M225 600h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7264%22 d=%22M300 600h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M375 600h75v75h-75zM450 600h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7258%22 d=%22M525 600h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M600 600h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e726b%22 d=%22M675 600h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M750 600h75v75h-75zM825 600h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7219%22 d=%22M900 600h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M975 600h75v75h-75zM1050 600h75v75h-75zM1125 600h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72cb%22 d=%22M1200 600h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7275%22 d=%22M1275 600h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1350 600h75v75h-75zM1425 600h75v75h-75zM0 675h75v75H0zM75 675h75v75H75zM150 675h75v75h-75zM225 675h75v75h-75zM300 675h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7218%22 d=%22M375 675h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M450 675h75v75h-75zM525 675h75v75h-75zM600 675h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72f5%22 d=%22M675 675h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7218%22 d=%22M750 675h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72a0%22 d=%22M825 675h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M900 675h75v75h-75zM975 675h75v75h-75zM1050 675h75v75h-75zM1125 675h75v75h-75zM1200 675h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72a2%22 d=%22M1275 675h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1350 675h75v75h-75zM1425 675h75v75h-75zM0 750h75v75H0zM75 750h75v75H75z%22%2F%3E%3Cpath fill=%22%234c4e7293%22 d=%22M150 750h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M225 750h75v75h-75zM300 750h75v75h-75zM375 750h75v75h-75zM450 750h75v75h-75zM525 750h75v75h-75zM600 750h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e725c%22 d=%22M675 750h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M750 750h75v75h-75zM825 750h75v75h-75zM900 750h75v75h-75zM975 750h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7259%22 d=%22M1050 750h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1125 750h75v75h-75zM1200 750h75v75h-75zM1275 750h75v75h-75zM1350 750h75v75h-75zM1425 750h75v75h-75zM0 825h75v75H0zM75 825h75v75H75zM150 825h75v75h-75zM225 825h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7203%22 d=%22M300 825h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M375 825h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7223%22 d=%22M450 825h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M525 825h75v75h-75zM600 825h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7266%22 d=%22M675 825h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M750 825h75v75h-75zM825 825h75v75h-75zM900 825h75v75h-75zM975 825h75v75h-75zM1050 825h75v75h-75zM1125 825h75v75h-75zM1200 825h75v75h-75zM1275 825h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7236%22 d=%22M1350 825h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e729a%22 d=%22M1425 825h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M0 900h75v75H0zM75 900h75v75H75zM150 900h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e720e%22 d=%22M225 900h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M300 900h75v75h-75zM375 900h75v75h-75zM450 900h75v75h-75zM525 900h75v75h-75zM600 900h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7209%22 d=%22M675 900h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M750 900h75v75h-75zM825 900h75v75h-75zM900 900h75v75h-75zM975 900h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72bc%22 d=%22M1050 900h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1125 900h75v75h-75zM1200 900h75v75h-75zM1275 900h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e7215%22 d=%22M1350 900h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1425 900h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e728a%22 d=%22M0 975h75v75H0z%22%2F%3E%3Cpath fill=%22none%22 d=%22M75 975h75v75H75zM150 975h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e726a%22 d=%22M225 975h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M300 975h75v75h-75zM375 975h75v75h-75zM450 975h75v75h-75zM525 975h75v75h-75zM600 975h75v75h-75zM675 975h75v75h-75zM750 975h75v75h-75zM825 975h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72cb%22 d=%22M900 975h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M975 975h75v75h-75zM1050 975h75v75h-75zM1125 975h75v75h-75zM1200 975h75v75h-75zM1275 975h75v75h-75zM1350 975h75v75h-75zM1425 975h75v75h-75zM0 1050h75v75H0zM75 1050h75v75H75zM150 1050h75v75h-75zM225 1050h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72be%22 d=%22M300 1050h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M375 1050h75v75h-75zM450 1050h75v75h-75zM525 1050h75v75h-75zM600 1050h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e729b%22 d=%22M675 1050h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M750 1050h75v75h-75zM825 1050h75v75h-75zM900 1050h75v75h-75zM975 1050h75v75h-75zM1050 1050h75v75h-75zM1125 1050h75v75h-75zM1200 1050h75v75h-75zM1275 1050h75v75h-75z%22%2F%3E%3Cpath fill=%22%234c4e72f6%22 d=%22M1350 1050h75v75h-75z%22%2F%3E%3Cpath fill=%22none%22 d=%22M1425 1050h75v75h-75z%22%2F%3E%3C%2Fg%3E%3Cdefs%3E%3CradialGradient id=%22a%22%3E%3Cstop offset=%220%22 stop-color=%22%23fff%22%2F%3E%3Cstop offset=%221%22 stop-color=%22%23fff%22 stop-opacity=%220%22%2F%3E%3C%2FradialGradient%3E%3C%2Fdefs%3E%3C%2Fsvg%3E");
        }
    </style>
    <style>
        /* If the screen size is 1200px wide or more, set the font-size to 80px */
        @media (min-width: 1200px) {
            .responsive-header {
                font-size: 64px;
            }

            .responsive-header1 {
                font-size: 50px;
            }

            .responsive-p {
                font-size: 24px;
            }

            .responsive-p1 {
                font-size: 22px;
            }

            .responsive-mini {
                font-size: 20px
            }

            .responsive-small {
                font-size: 16px
            }
        }

        /* If the screen size is smaller than 1200px, set the font-size to 80px */
        @media (max-width: 1199.98px) {
            .responsive-header {
                font-size: 40px;
            }

            .responsive-header1 {
                font-size: 30px;
            }

            .responsive-p {
                font-size: 16px;
            }

            .responsive-p1 {
                font-size: 14px;
            }

            .responsive-mini {
                font-size: 14px
            }
        }
    </style>
    <style>
        /* Typewriter effect 1 */
        @keyframes typing {

            0%,
            1% {
                content: "";
            }

            1%,
            2% {
                content: "S";
            }

            2%,
            3% {
                content: "Se";
            }

            3%,
            4% {
                content: "Sel";
            }

            4%,
            5% {
                content: "Sela";
            }

            5%,
            6% {
                content: "Selam";
            }

            6%,
            7% {
                content: "Selamat";
            }

            7%,
            8% {
                content: "Selamat Da";
            }

            8%,
            9% {
                content: "Selamat Data";
            }

            10%,
            25% {
                content: "Selamat Datang";
            }

            52%,
            55% {
                content: "";
            }

            56%,
            57% {
                content: "L";
            }

            58%,
            59% {
                content: "Le";
            }

            60%,
            61% {
                content: "Lea";
            }

            62%,
            63% {
                content: "Lear";
            }

            64%,
            65% {
                content: "Learn";
            }

            66%,
            67% {
                content: "Learni";
            }

            68%,
            69% {
                content: "Learning";
            }

            70%,
            71% {
                content: "Learning Pro";
            }

            72%,
            73% {
                content: "Learning Program";
            }

            74%,
            75% {
                content: "Learning Program Bank";
            }

            76%,
            77% {
                content: "Learning Program Bank Beng";
            }

            78%,
            79% {
                content: "Learning Program Bank Bengku";
            }

            80%,
            100% {
                content: "Learning Program Bank Bengkulu";
            }
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .typewriter {
            --caret: currentcolor;
        }

        .typewriter::before {
            content: "";
            animation: typing 13.5s infinite;
        }

        .typewriter::after {
            content: "";
            border-right: 1px solid var(--caret);
            animation: blink 0.5s linear infinite;
        }

        .typewriter.thick::after {
            border-right: 1ch solid var(--caret);
        }

        .typewriter.nocaret::after {
            border-right: 0;
        }


        @media (prefers-reduced-motion) {
            .typewriter::after {
                animation: none;
            }

            @keyframes sequencePopup {

                0%,
                100% {
                    content: "Selamat Datang!";
                }

                25% {
                    content: "E-Learning Bank Bengkulu";
                }

                50% {
                    content: "reader";
                }

                75% {
                    content: "human";
                }
            }

            .typewriter::before {
                content: "Selamat Datang!";
                animation: sequencePopup 12s linear infinite;
            }
        }
    </style>
    <section class="magicpattern test py-4 py-xl-5" style="height: 750px;">
        <div class="container h-100">
            <div class="row h-100">
                <div
                    class="col-md-10 col-xl-11 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div>
                        <h5 class="fw-semibold mb-3 responsive-mini" style="color: rgb(255,255,255);">Learning Program Bank
                            Bengkulu
                        </h5>
                        <h3 class="fw-bolder mb-3 responsive-header typewriter thick"
                            style="text-align: center;color: rgb(255,255,255);">

                        </h3>
                        <p class="fw-semibold mb-4 responsive-p" style="color: rgb(255,255,255);">”Jika Kamu tidak sanggup
                            menahan lelahnya belajar maka kamu harus sanggup menahan perihnya kebodohan" ~ Imam Asy Syafi'i
                        </p>
                        <a href="/login"
                            class="btn btn-warning btn-lg fs-5 fw-semibold rounded-pill shadow-sm me-2 py-2 px-4"
                            type="button" style="width: 166.475px;height: 45.375px;"
                            data-bss-hover-animate="tada">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container py-4 py-xl-5 mb-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-12 text-center mx-auto">
                <h2 class="fw-bolder mb-3 responsive-header1">Akses Cepat</h2>
                <p class="fw-semibold mb-4 responsive-p1">Kunjungi fitur utama dari sistem</p>
            </div>
        </div>
        <div class="row px-5 gy-4 row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card border-0">
                    <div class="card-body shadow p-4" data-bss-hover-animate="pulse">
                        <div
                            class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                            <?xml version="1.0" encoding="UTF-8"?>
                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                            <svg width="70px" height="70px" viewBox="0 0 512 512" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>question-filled</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="add" fill="#000000" transform="translate(42.666667, 42.666667)">
                                        <path
                                            d="M213.333333,3.55271368e-14 C331.153707,3.55271368e-14 426.666667,95.51168 426.666667,213.333333 C426.666667,331.153707 331.153707,426.666667 213.333333,426.666667 C95.51296,426.666667 3.55271368e-14,331.153707 3.55271368e-14,213.333333 C3.55271368e-14,95.51168 95.51296,3.55271368e-14 213.333333,3.55271368e-14 Z M213.332053,282.666667 C198.60416,282.666667 186.665387,294.60544 186.665387,309.333333 C186.665387,324.061227 198.60416,336 213.332053,336 C228.059947,336 239.99872,324.061227 239.99872,309.333333 C239.99872,294.60544 228.059947,282.666667 213.332053,282.666667 Z M209.77344,93.3346133 C189.007787,93.3346133 171.554773,98.9922133 157.43488,110.274773 C140.703147,123.790507 132.34368,143.751253 132.34368,170.173227 L132.34368,170.173227 L177.7056,170.173227 L177.7056,169.868587 C177.7056,159.787733 179.829333,151.518293 184.065067,145.069013 C189.911467,136.398507 199.39328,132.059947 212.501333,132.059947 C220.56768,132.059947 227.4336,134.177067 233.070293,138.404907 C240.125013,144.26304 243.664,153.13024 243.664,165.028693 C243.664,172.49216 241.839787,179.143253 238.214827,184.994773 C235.188693,190.2368 230.350293,195.374933 223.686187,200.42048 C209.571627,210.098773 200.394453,219.679573 196.165333,229.162667 C192.53504,237.027413 190.710827,249.530027 190.710827,266.666667 L190.710827,266.666667 L233.376213,266.666667 C233.376213,255.371093 234.87744,246.90624 237.916587,241.257813 C240.331947,236.618667 245.378987,231.682347 253.042987,226.434987 C266.358187,216.549547 275.828267,207.371093 281.479253,198.90112 C288.33216,188.82176 291.76704,177.01952 291.76704,163.504 C291.76704,135.494827 280.37504,115.62624 257.571627,103.9232 C243.865813,96.86848 227.933653,93.3346133 209.77344,93.3346133 Z"
                                            id="Combined-Shape">

                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h4 class="fw-bold responsive-p text-center">FAQ</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0">
                    <div class="card-body shadow p-4" data-bss-hover-animate="pulse">
                        <div
                            class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                            <?xml version="1.0" encoding="utf-8"?>

                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                            <svg width="70px" height="70px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <title>dashboard-tile-solid</title>
                                <g id="Layer_2" data-name="Layer 2">
                                    <g id="invisible_box" data-name="invisible box">
                                        <rect width="48" height="48" fill="none" />
                                    </g>
                                    <g id="icons_Q2" data-name="icons Q2">
                                        <g>
                                            <path
                                                d="M20,30H8a2,2,0,0,0-2,2V42a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V32a2,2,0,0,0-2-2Z" />
                                            <path
                                                d="M20,4H8A2,2,0,0,0,6,6V24a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V6a2,2,0,0,0-2-2Z" />
                                            <path
                                                d="M40,4H28a2,2,0,0,0-2,2V16a2,2,0,0,0,2,2H40a2,2,0,0,0,2-2V6a2,2,0,0,0-2-2Z" />
                                            <path
                                                d="M40,22H28a2,2,0,0,0-2,2V42a2,2,0,0,0,2,2H40a2,2,0,0,0,2-2V24a2,2,0,0,0-2-2Z" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h4 class="fw-bold responsive-p text-center">Dashboard Pegawai</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <a href="/materi" style="text-decoration: none;" class="text-black">
                    <div class="card border-0">
                        <div class="card-body shadow p-4" data-bss-hover-animate="pulse">
                            <div
                                class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                                <?xml version="1.0" encoding="utf-8"?>
                                <!DOCTYPE svg
                                    PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg height="70px" width="70px" version="1.1" id="_x32_"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 512 512" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #000000;
                                        }
                                    </style>
                                    <g>
                                        <path class="st0"
                                            d="M164.128,155.406c-0.017-11.098-0.017-20.759,1.346-29.9l-7.987,9.166
                                    c-14.001,16.134-49.379,26.563-79.029,23.301c-29.666-3.262-42.346-18.986-28.345-35.128l105.4-110.292
                                    c2.049-2.15,2.626-5.311,1.456-8.054c-1.163-2.727-3.856-4.5-6.825-4.5h-16.978c-4.968,0-9.719,1.982-13.206,5.52L28.527,98.174
                                    c-18.76,19.638-17.89,30.544-17.89,61.089c0,21.812,0,301.06,0,301.06c0,26.196,32.92,47.824,62.578,51.078
                                    c29.65,3.27,70.272-7.168,84.273-23.302l9.317-10.832c-1.673-5.402-2.676-11.04-2.676-16.945V155.406z" />
                                        <path class="st0"
                                            d="M493.952,0h-18.375c-5.36,0-10.454,2.324-13.984,6.356l-111.84,128.316c-14,16.134-49.379,26.563-79.02,23.301
                                    c-29.667-3.262-42.346-18.986-28.345-35.128l105.4-110.292c2.041-2.15,2.626-5.311,1.456-8.054c-1.172-2.727-3.856-4.5-6.825-4.5
                                    H325.44c-4.968,0-9.727,1.982-13.206,5.52l-91.432,92.654c-18.76,19.638-17.89,30.544-17.89,61.089c0,21.812,0,301.06,0,301.06
                                    c0,26.196,32.92,47.824,62.569,51.078c29.658,3.27,70.272-7.168,84.272-23.302L487.896,327.64
                                    c8.69-10.103,13.474-22.984,13.474-36.315V7.418C501.37,3.328,498.051,0,493.952,0z" />
                                    </g>
                                </svg>
                            </div>
                            <h4 class="fw-bold responsive-p text-center">Informasi Kelas</h4>
                        </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card border-0">
                <div class="card-body shadow p-4" data-bss-hover-animate="pulse">
                    <div
                        class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                        <?xml version="1.0" encoding="utf-8"?>
                        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                        <svg fill="#000000" width="70px" height="70px" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>book</title>
                            <path
                                d="M15 25.875v-19.625c0 0-2.688-2.25-6.5-2.25s-6.5 2-6.5 2v19.875c0 0 2.688-1.938 6.5-1.938s6.5 1.938 6.5 1.938zM29 25.875v-19.625c0 0-2.688-2.25-6.5-2.25s-6.5 2-6.5 2v19.875c0 0 2.688-1.938 6.5-1.938s6.5 1.938 6.5 1.938zM31 8h-1v19h-12v1h-5v-1h-12v-19h-1v20h12v1h7.062l-0.062-1h12v-20z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="fw-bold responsive-p text-center">Panduan</h4>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="container py-4 py-xl-5 mb-5">
        <div class="row row-cols-2 row-cols-md-4 px-5 mx-5" style="position: relative;display: padding-top: 14px;">
            <div class="col">
                <div class="p-3">
                    <h4 class="fw-bold mb-0 responsive-header1" id="counter1">3.822</h4>
                    <p class="fw-bold mb-0 responsive-mini">Pengguna Terdaftar</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                    <h4 class="fw-bold mb-0 responsive-header1" id="counter2">24</h4>
                    <p class="fw-semibold mb-0 responsive-mini">Kelas Materi</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                    <h4 class="fw-bold mb-0 responsive-header1" id="counter3">230</h4>
                    <p class="fw-semibold mb-0 responsive-mini">Topik Materi</p>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                    <h4 class="fw-bold mb-0 responsive-header1" id="counter4">1.080</h4>
                    <p class="fw-semibold mb-0 responsive-mini">Sertifikat Dikeluarkan</p>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <script>
        let counts4 = setInterval(updated4);
        let upto4 = 0;

        function updated4() {
            var count4 = document.getElementById("counter4");
            count4.innerHTML = ++upto4;
            if (upto4 === 1000) {
                clearInterval(counts4);
            }
        }
    </script>
    <script>
        let counts3 = setInterval(updated3);
        let upto3 = 0;

        function updated3() {
            var count3 = document.getElementById("counter3");
            count3.innerHTML = ++upto3;
            if (upto3 === 560) {
                clearInterval(counts3);
            }
        }
    </script>
    <script>
        let counts2 = setInterval(updated2);
        let upto2 = 0;

        function updated2() {
            var count2 = document.getElementById("counter2");
            count2.innerHTML = ++upto2;
            if (upto2 === 124) {
                clearInterval(counts2);
            }
        }
    </script>
    <script>
        let counts1 = setInterval(updated1);
        let upto1 = 0;

        function updated1() {
            var count1 = document.getElementById("counter1");
            count1.innerHTML = ++upto1;
            if (upto1 === 3279) {
                clearInterval(counts1);
            }
        }
    </script> --}}
@endsection
