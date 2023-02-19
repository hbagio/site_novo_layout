<div class="toolbar">
        <form class="container flex_row menu_fechado" id="menu_filtro_mobile" action="/p" method="GET" enctype="multipart/form-data">
            @csrf
           <div class="container_campo col_4">
                <label for="filtro_categoria" class="campo_label col_6">Categoria</label>
                <div class="campo">
                    <select name="categoriaSelect" id="filtro_categoria">
                        <option value="0" selected>Todos</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="campo_acao"><i class="fa-solid fa-filter"></i></button>
           </div>
           <div class="container_campo">
                <div class="campo">
                    <input type="text" name="filtro_pesquisa" id="filtro_pesquisa" placeholder="pesquisar na loja">
                </div>
                <button type="submit" class="campo_acao" ><i class="fa-solid fa-magnifying-glass"></i></button>
           </div>
           <button type="button" id="btn_acessa_filtros_mobile" class="centralize_item" onclick="Principal.controlaMenuFiltroMobile()"><i class="fa-solid fa-filter"></i></button>
        </form>

        
    </div>
