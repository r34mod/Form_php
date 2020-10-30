<?php
/**
 * Radio
 * 
 * @param string nombre del campo
 * @param array opciones a elegir
 * @param string opción seleccionada
 * @param string extras
 */
function inputRadio($name, $options, $checked = false, $more = '') {
    foreach ($options as $key => $value) {
        printf('<input type="radio" name="%s" value="%s" %s %s>%s',
            $name,
            $key,
            $key == $checked ? 'checked' : '',
            $more,
            $value
        );
    }
}

/**
 * Checkbox
 * 
 * @param string nombre del campo
 * @param array opciones a elegir
 * @param mixed opción u opciones seleccionadas
 * @param string extras
 */
function inputCheckbox($name, $options, $checked = [], $more = '') {
    if (!is_array($checked)) {
        $checked = [$checked];
    }
    foreach ($options as $key => $value) {
        printf('<input type="checkbox" name="%s" value="%s" %s %s>%s',
            $name,
            $key,
            in_array($key, $checked) ? 'checked' : '',
            $more,
            $value
        );
    }
}

/**
 * Select
 * 
 * @param string nombre del campo
 * @param array opciones a elegir
 * @param mixed opción u opciones seleccionadas
 * @param bool multiple selección
 * @param string extras
 */
function inputSelect($name, $options, $selected = [], $multiple = false, $more = '') {
    if (!is_array($selected)) {
        $selected = [$selected];
    }
    printf('<select name="%s" %s %s>', 
        $name,
        $multiple ? 'multiple' : '', 
        $more
    );
    foreach ($options as $key => $value) {
        printf('<option value="%s" %s>%s</option>',
            $key,
            in_array($key, $selected) ? 'selected' : '',
            $value
        );
    }
    printf('</select>');
}

/**
 * Devuelve una tira de opciones separadas por un separador
 * 
 * @param array posibles opciones
 * @param mixed opción u opciones seleccionadas
 * @param string separador [,]
 * @return string
 */
function showOption($options, $selected, $separator = SEP_OPCIONES) {
    if (!is_array($selected)) {
        $selected = [$selected];
    }
    $show = [];
    foreach ($options as $key => $value) {
        if (in_array($key, $selected)) {
            $show[] = $value;
        }
    }
    return implode($separator, $show);
}

/**
 * Convierte una fecha de formato yyyy-mm-dd a formato dd-mm-yyyy
 * 
 * @param string fecha en formato yyyy-mm-dd
 * @return string fecha en formato dd-mm-yyyy
 */
function formatDate($date) {
    return substr($date, 8, 2).'-'.substr($date, 5, 2).'-'.substr($date, 0, 4);
}

/**
 * [Desarrollo] Volcar una variable
 * 
 * @param mixed
 */
function dump($mixed) {
    echo '<pre>';
    var_dump($mixed);
    echo '</pre>';
}


?>