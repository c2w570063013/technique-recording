Configure vim to make it more useful
```shell script
vim ~/.vimrc
```
add the following content to .vimrc
```shell script
syntax on

colorscheme desert

filetype indent on

filetype plugin on
filetype plugin indent on

set nu

set autoread

set mouse=a

set selection=exclusive
set selectmode=mouse,key


set showmatch

set ignorecase

set hlsearch

set autoindent

set smartindent

set cindent

set tabstop=4

set softtabstop=4
set shiftwidth=4

set fenc=utf-8
set fencs=utf-8,usc-bom,euc-jp,gb18030,gbk,gb2312,cp936

set guifont=Courier_New:h11:cANSI
set guifontwide=新宋体:h11:cGB2312

set enc=utf-8
set fileencodings=ucs-bom,utf-8,chinese
set langmenu=zh_CN.UTF-8
language message zh_CN.UTF-8
source $VIMRUNTIME/delmenu.vim
source $VIMRUNTIME/menu.vim

filetype plugin indent on
set completeopt=longest,menu

set wildmenu
autocmd FileType ruby,eruby set omnifunc=rubycomplete#Complete
autocmd FileType python set omnifunc=pythoncomplete#Complete
autocmd FileType javascript set omnifunc=javascriptcomplete#CompleteJS
autocmd FileType html set omnifunc=htmlcomplete#CompleteTags
autocmd FileType css set omnifunc=csscomplete#CompleteCSS
autocmd FileType xml set omnifunc=xmlcomplete#CompleteTags
autocmd FileType java set omnifunc=javacomplete#Complet
```