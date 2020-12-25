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

/* @bootstrap_storybook/views/views-view--table.twig */
class __TwigTemplate_c39c54637ea397b9bae8a4f60b8e1f5af3477995db86d94243be29c9d5bb54bd extends \Twig\Template
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
        // line 7
        echo "
";
        // line 8
        $context["classes"] = [0 => ("cols-" . twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(        // line 9
($context["header"] ?? null), 9, $this->source))), 1 => ((        // line 10
($context["responsive"] ?? null)) ? ("responsive-enabled") : ("")), 2 => ((        // line 11
($context["sticky"] ?? null)) ? ("sticky-enabled") : ("")), 3 => "table", 4 => "table-bordered"];
        // line 15
        echo "<div class=\"table-responsive\">
  <table";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 16), 16, $this->source), "html", null, true);
        echo ">
    ";
        // line 17
        if (($context["caption_needed"] ?? null)) {
            // line 18
            echo "      <caption>
        ";
            // line 19
            if (($context["caption"] ?? null)) {
                // line 20
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caption"] ?? null), 20, $this->source), "html", null, true);
                echo "
        ";
            } else {
                // line 22
                echo "          ";
                $this->loadTemplate("@bootstrap_storybook/title/title.twig", "@bootstrap_storybook/views/views-view--table.twig", 22)->display($context);
                // line 23
                echo "        ";
            }
            // line 24
            echo "        ";
            if (( !twig_test_empty(($context["summary"] ?? null)) ||  !twig_test_empty(($context["description"] ?? null)))) {
                // line 25
                echo "          <details>
            ";
                // line 26
                if ( !twig_test_empty(($context["summary"] ?? null))) {
                    // line 27
                    echo "              <summary>";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["summary"] ?? null), 27, $this->source), "html", null, true);
                    echo "</summary>
            ";
                }
                // line 29
                echo "            ";
                if ( !twig_test_empty(($context["description"] ?? null))) {
                    // line 30
                    echo "              ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["description"] ?? null), 30, $this->source), "html", null, true);
                    echo "
            ";
                }
                // line 32
                echo "          </details>
        ";
            }
            // line 34
            echo "      </caption>
    ";
        }
        // line 36
        echo "    ";
        if (($context["header"] ?? null)) {
            // line 37
            echo "      <thead class=\"bg-light\">
      <tr>
        ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 40
                echo "          ";
                if (twig_get_attribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 40)) {
                    // line 41
                    echo "            ";
                    $context["column_classes"] = [0 => "views-field", 1 => ("views-field-" . $this->sandbox->ensureToStringAllowed((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 =                     // line 43
($context["fields"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["key"]] ?? null) : null), 43, $this->source))];
                    // line 45
                    echo "          ";
                }
                // line 46
                echo "        <th";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 46), "addClass", [0 => ($context["column_classes"] ?? null)], "method", false, false, true, 46), "setAttribute", [0 => "scope", 1 => "col"], "method", false, false, true, 46), 46, $this->source), "html", null, true);
                echo ">";
                // line 47
                if (twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 47)) {
                    // line 48
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 48), 48, $this->source), "html", null, true);
                    echo ">";
                    // line 49
                    if (twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 49)) {
                        // line 50
                        echo "<a href=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 50), 50, $this->source), "html", null, true);
                        echo "\"
                 title=\"";
                        // line 51
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
                        echo "\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 53
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
                    }
                    // line 55
                    echo "</";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
                    echo ">";
                } else {
                    // line 57
                    if (twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 57)) {
                        // line 58
                        echo "<a href=\"";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "url", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
                        echo "\"
                 title=\"";
                        // line 59
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "title", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
                        echo "\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
                        echo "</a>";
                    } else {
                        // line 61
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "sort_indicator", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
                    }
                }
                // line 64
                echo "</th>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "      </tr>
      </thead>
    ";
        }
        // line 69
        echo "    <tbody>
    ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 71
            echo "      <tr";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 71), 71, $this->source), "html", null, true);
            echo ">
        ";
            // line 72
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["row"], "columns", [], "any", false, false, true, 72));
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 73
                echo "          ";
                if (twig_get_attribute($this->env, $this->source, $context["column"], "default_classes", [], "any", false, false, true, 73)) {
                    // line 74
                    echo "            ";
                    $context["column_classes"] = [0 => "views-field"];
                    // line 77
                    echo "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "fields", [], "any", false, false, true, 77));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 78
                        echo "              ";
                        $context["column_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["column_classes"] ?? null), 78, $this->source), [0 => ("views-field-" . $this->sandbox->ensureToStringAllowed($context["field"], 78, $this->source))]);
                        // line 79
                        echo "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 80
                    echo "          ";
                }
                // line 81
                echo "        <td";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 81), "addClass", [0 => ($context["column_classes"] ?? null)], "method", false, false, true, 81), 81, $this->source), "html", null, true);
                echo ">";
                // line 82
                if (twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 82)) {
                    // line 83
                    echo "<";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
                    echo ">
            ";
                    // line 84
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 84));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 85
                        echo "              ";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
                        echo "
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 87
                    echo "            </";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "wrapper_element", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
                    echo ">";
                } else {
                    // line 89
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 89));
                    foreach ($context['_seq'] as $context["_key"] => $context["content"]) {
                        // line 90
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "separator", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["content"], "field_output", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                // line 93
                echo "          </td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "    </tbody>
  </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/views/views-view--table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 97,  277 => 95,  270 => 93,  262 => 90,  258 => 89,  253 => 87,  243 => 85,  239 => 84,  234 => 83,  232 => 82,  228 => 81,  225 => 80,  219 => 79,  216 => 78,  211 => 77,  208 => 74,  205 => 73,  201 => 72,  196 => 71,  192 => 70,  189 => 69,  184 => 66,  177 => 64,  172 => 61,  165 => 59,  160 => 58,  158 => 57,  153 => 55,  149 => 53,  142 => 51,  137 => 50,  135 => 49,  131 => 48,  129 => 47,  125 => 46,  122 => 45,  120 => 43,  118 => 41,  115 => 40,  111 => 39,  107 => 37,  104 => 36,  100 => 34,  96 => 32,  90 => 30,  87 => 29,  81 => 27,  79 => 26,  76 => 25,  73 => 24,  70 => 23,  67 => 22,  61 => 20,  59 => 19,  56 => 18,  54 => 17,  50 => 16,  47 => 15,  45 => 11,  44 => 10,  43 => 9,  42 => 8,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/views/views-view--table.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/views/views-view--table.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 8, "if" => 17, "include" => 22, "for" => 39);
        static $filters = array("length" => 9, "escape" => 16, "merge" => 78);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include', 'for'],
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
