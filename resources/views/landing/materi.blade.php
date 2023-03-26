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
    <section class="magicpattern test py-4 py-xl-5" style="height: 750px;">
        <div class="container h-100">
            <div class="row h-100">
                <div
                    class="col-md-10 col-xl-11 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div>
                        <h5 class="fw-semibold mb-3 responsive-mini" style="color: rgb(255,255,255);">Sistem Pembelajaran Bank
                            Bengkulu
                        </h5>
                        <h3 class="fw-bolder mb-3 responsive-header" style="text-align: center;color: rgb(255,255,255);">
                            Halaman Informasi Kelas
                        </h3>
                        <p class="fw-semibold mb-4 responsive-p" style="color: rgb(255,255,255);">Tersedia kelas dengan beragam topik materi yang dapat Anda ikuti. Klik kelas yang tersedia untuk melihat informasi kelas, tenggat dan kriteria kelulusan.</p>
                        <button class="btn btn-warning btn-lg fs-5 fw-semibold rounded-pill shadow-sm me-2 py-2 px-4"
                            type="button" style="width: 166.475px;height: 45.375px;" data-bss-hover-animate="tada">Lihat
                            Kelas</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-4 py-xl-5 mb-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-12 text-center mx-auto">
                <h2 class="fw-bolder mb-3 responsive-header1">Daftar Kelas</h2>
            </div>
        </div>
       
    </div>
@endsection
