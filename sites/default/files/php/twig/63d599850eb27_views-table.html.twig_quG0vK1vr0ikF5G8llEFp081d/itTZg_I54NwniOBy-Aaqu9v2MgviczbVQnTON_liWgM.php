<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/dardev_table/templates/views-table.html.twig */
class __TwigTemplate_e054d003047137f6fe23a38eac1cb99092c2e3472bed2a044124184ecb54f745 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
        echo "  ";
        // line 37
        $context["classes"] = [0 => ("cols-" . twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(        // line 38
($context["header"] ?? null), 38, $this->source))), 1 => ((        // line 39
($context["responsive"] ?? null)) ? ("responsive-enabled") : ("")), 2 => ((        // line 40
($context["sticky"] ?? null)) ? ("sticky-enabled") : (""))];
        // line 43
        echo "  <table";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 43), 43, $this->source), "html", null, true);
        echo ">
    ";
        // line 44
        if (($context["caption_needed"] ?? null)) {
            // line 45
            echo "      <caption>
      ";
            // line 46
            if (($context["caption"] ?? null)) {
                // line 47
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption"] ?? null), 47, $this->source), "html", null, true);
                echo "
      ";
            } else {
                // line 49
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 49, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 51
            echo "      ";
            if ( !twig_test_empty(($context["summary_element"] ?? null))) {
                // line 52
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["summary_element"] ?? null), 52, $this->source), "html", null, true);
                echo "
      ";
            }
            // line 54
            echo "      </caption>
    ";
        }
        // line 56
        echo "    ";
        if (($context["header"] ?? null)) {
            // line 57
            echo "      <thead>
        <tr>
          ";
            // line 59
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 60
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 60)) {
                    // line 61
                    echo "              ";
                    // line 62
                    $context["column_classes"] = [0 => "views-field", 1 => ("views-field-" . $this->sandbox->ensureToStringAllowed((($__internal_compile_0 =                     // line 64
($context["fields"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["key"]] ?? null) : null), 64, $this->source))];
                    // line 67
                    echo "            ";
                }
                // line 68
                echo "            <th";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 68), "addClass", [0 => ($context["column_classes"] ?? null)], "method", false, false, true, 68), "setAttribute", [0 => "scope", 1 => "col"], "method", false, false, true, 68), 68, $this->source), "html", null, true);
                echo ">";
                // line 69
                if (twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 69)) {
                    // line 70
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
                    echo ">";
                    // line 71
                    if (twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 71)) {
                        // line 72
                        echo "<a href=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
                        echo "\" title=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
                        echo "\" rel=\"nofollow\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 74
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
                    }
                    // line 76
                    echo "</";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 76), 76, $this->source), "html", null, true);
                    echo ">";
                } else {
                    // line 78
                    if (twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 78)) {
                        // line 79
                        echo "<a href=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
                        echo "\" title=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
                        echo "\" rel=\"nofollow\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 81
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
                    }
                }
                // line 84
                echo "</th>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            echo "        </tr>
      </thead>
    ";
        }
        // line 89
        echo "    <tbody>
      ";
        // line 90
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 91
            echo "        <tr";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 91), 91, $this->source), "html", null, true);
            echo ">

          ";
            // line 93
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["row"], "columns", [], "any", false, false, true, 93));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 94
                echo "          ";
                if (($context["header"] ?? null)) {
                    // line 95
                    echo "          ";
                    // line 96
                    $context["column_id"] = [0 => ""];
                    // line 100
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["columno"]) {
                        // line 101
                        echo "       
          
          ";
                        // line 103
                        $context["column_id"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["column_id"] ?? null), 103, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["columno"], "content", [], "any", false, false, true, 103)]);
                        // line 104
                        echo "          
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['columno'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 106
                    echo "          ";
                }
                // line 107
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 107)) {
                    // line 108
                    echo "              ";
                    // line 109
                    $context["column_classes"] = [0 => "views-field"];
                    // line 113
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "fields", [], "any", false, false, true, 113));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 114
                        echo "                ";
                        $context["column_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["column_classes"] ?? null), 114, $this->source), [0 => ("views-field-" . $this->sandbox->ensureToStringAllowed($context["field"], 114, $this->source))]);
                        // line 115
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 116
                    echo "            ";
                }
                // line 117
                echo "            <td";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 117), "addClass", [0 => ($context["column_classes"] ?? null)], "method", false, false, true, 117), "setAttribute", [0 => "data-label", 1 => (($__internal_compile_1 = ($context["column_id"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 117)] ?? null) : null)], "method", false, false, true, 117), 117, $this->source), "html", null, true);
                echo "  ";
                if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 117)) {
                    echo " scope=\"row \"";
                }
                echo ">";
                // line 118
                if (twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 118)) {
                    // line 119
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 119), 119, $this->source), "html", null, true);
                    echo ">
                ";
                    // line 120
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 120));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 121
                        echo "                  ";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 121), 121, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 121), 121, $this->source), "html", null, true);
                        echo "  
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 123
                    echo "                </";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 123), 123, $this->source), "html", null, true);
                    echo ">";
                } else {
                    // line 125
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 125));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 126
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 126), 126, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 126), 126, $this->source), "html", null, true);
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 129
                echo "            </td>
          ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 131
            echo "        </tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 133
        echo "    </tbody>
  </table>
  ";
    }

    public function getTemplateName()
    {
        return "modules/custom/dardev_table/templates/views-table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 133,  308 => 131,  293 => 129,  285 => 126,  281 => 125,  276 => 123,  266 => 121,  262 => 120,  257 => 119,  255 => 118,  247 => 117,  244 => 116,  238 => 115,  235 => 114,  230 => 113,  228 => 109,  226 => 108,  223 => 107,  220 => 106,  213 => 104,  211 => 103,  207 => 101,  202 => 100,  200 => 96,  198 => 95,  195 => 94,  178 => 93,  172 => 91,  168 => 90,  165 => 89,  160 => 86,  153 => 84,  148 => 81,  138 => 79,  136 => 78,  131 => 76,  127 => 74,  117 => 72,  115 => 71,  111 => 70,  109 => 69,  105 => 68,  102 => 67,  100 => 64,  99 => 62,  97 => 61,  94 => 60,  90 => 59,  86 => 57,  83 => 56,  79 => 54,  73 => 52,  70 => 51,  64 => 49,  58 => 47,  56 => 46,  53 => 45,  51 => 44,  46 => 43,  44 => 40,  43 => 39,  42 => 38,  41 => 37,  39 => 36,);
    }

    public function getSourceContext()
    {
        return new Source("{#
  /**
   * @file
   * Default theme implementation for displaying a view as a table.
   *
   * Available variables:
   * - attributes: Remaining HTML attributes for the element.
   *   - class: HTML classes that can be used to style contextually through CSS.
   * - title : The title of this group of rows.
   * - header: The table header columns.
   *   - attributes: Remaining HTML attributes for the element.
   *   - content: HTML classes to apply to each header cell, indexed by
   *   the header's key.
   *   - default_classes: A flag indicating whether default classes should be
   *     used.
   * - caption_needed: Is the caption tag needed.
   * - caption: The caption for this table.
   * - accessibility_description: Extended description for the table details.
   * - accessibility_summary: Summary for the table details.
   * - rows: Table row items. Rows are keyed by row number.
   *   - attributes: HTML classes to apply to each row.
   *   - columns: Row column items. Columns are keyed by column number.
   *     - attributes: HTML classes to apply to each column.
   *     - content: The column content.
   *   - default_classes: A flag indicating whether default classes should be
   *     used.
   * - responsive: A flag indicating whether table is responsive.
   * - sticky: A flag indicating whether table header is sticky.
   * - summary_element: A render array with table summary information (if any).
   *
   * @see template_preprocess_views_view_table()
   *
   * @ingroup themeable
   */
  #}
  {%
    set classes = [
      'cols-' ~ header|length,
      responsive ? 'responsive-enabled',
      sticky ? 'sticky-enabled',
    ]
  %}
  <table{{ attributes.addClass(classes) }}>
    {% if caption_needed %}
      <caption>
      {% if caption %}
        {{ caption }}
      {% else %}
        {{ title }}
      {% endif %}
      {% if (summary_element is not empty) %}
        {{ summary_element }}
      {% endif %}
      </caption>
    {% endif %}
    {% if header %}
      <thead>
        <tr>
          {% for key, column in header %}
            {% if column.default_classes %}
              {%
                set column_classes = [
                  'views-field',
                  'views-field-' ~ fields[key],
                ]
              %}
            {% endif %}
            <th{{ column.attributes.addClass(column_classes).setAttribute('scope', 'col') }}>
              {%- if column.wrapper_element -%}
                <{{ column.wrapper_element }}>
                  {%- if column.url -%}
                    <a href=\"{{ column.url }}\" title=\"{{ column.title }}\" rel=\"nofollow\">{{ column.content }}{{ column.sort_indicator }}</a>
                  {%- else -%}
                    {{ column.content }}{{ column.sort_indicator }}
                  {%- endif -%}
                </{{ column.wrapper_element }}>
              {%- else -%}
                {%- if column.url -%}
                  <a href=\"{{ column.url }}\" title=\"{{ column.title }}\" rel=\"nofollow\">{{ column.content }}{{ column.sort_indicator }}</a>
                {%- else -%}
                  {{- column.content }}{{ column.sort_indicator }}
                {%- endif -%}
              {%- endif -%}
            </th>
          {% endfor %}
        </tr>
      </thead>
    {% endif %}
    <tbody>
      {% for row in rows %}
        <tr{{ row.attributes }}>

          {% for key, column in row.columns %}
          {% if header %}
          {%
            set column_id = [
              ''
            ]
          %}
          {% for columno in header %}
       
          
          {% set column_id = column_id|merge([columno.content])  %}
          
          {% endfor %}
          {% endif %}
            {% if column.default_classes %}
              {%
                set column_classes = [
                  'views-field'
                ]
              %}
              {% for field in column.fields %}
                {% set column_classes = column_classes|merge(['views-field-' ~ field]) %}
              {% endfor %}
            {% endif %}
            <td{{ column.attributes.addClass(column_classes).setAttribute('data-label', column_id[loop.index]) }}  {% if loop.first %} scope=\"row \"{% endif %}>
              {%- if column.wrapper_element -%}
                <{{ column.wrapper_element }}>
                {% for content in column.content %}
                  {{ content.separator }}{{ content.field_output }}  
                {% endfor %}
                </{{ column.wrapper_element }}>
              {%- else -%}
                {% for content in column.content %}
                  {{- content.separator }}{{ content.field_output -}} 
                {% endfor %}
              {%- endif %}
            </td>
          {% endfor %}
        </tr>
      {% endfor %}
    </tbody>
  </table>
  ", "modules/custom/dardev_table/templates/views-table.html.twig", "/opt/drupal/web/modules/custom/dardev_table/templates/views-table.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 37, "if" => 44, "for" => 59);
        static $filters = array("length" => 38, "escape" => 43, "merge" => 103);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['length', 'escape', 'merge'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
