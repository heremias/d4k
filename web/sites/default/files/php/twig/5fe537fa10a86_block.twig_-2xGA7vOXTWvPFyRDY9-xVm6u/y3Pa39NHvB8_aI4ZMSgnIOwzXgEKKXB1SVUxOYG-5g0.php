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

/* @boom/block/block.twig */
class __TwigTemplate_c9341ba622067c55613db28b0505933958251d39630d9af0117d801f9b7e38dc extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        if ( !array_key_exists("utility_classes", $context)) {
            // line 29
            echo "  ";
            $context["utility_classes"] = [];
        }
        // line 31
        echo "
";
        // line 33
        $context["classes"] = twig_array_merge([0 => "block", 1 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 35
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 35), 35, $this->source))), 2 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 36
($context["plugin_id"] ?? null), 36, $this->source)))], $this->sandbox->ensureToStringAllowed(        // line 37
($context["utility_classes"] ?? null), 37, $this->source));
        // line 39
        echo "
<div";
        // line 40
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 40), 40, $this->source), "html", null, true);
        echo ">
  ";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 41, $this->source), "html", null, true);
        echo "
  ";
        // line 42
        if (($context["label"] ?? null)) {
            // line 43
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 43, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 43, $this->source), "html", null, true);
            echo "</h2>
  ";
        }
        // line 45
        echo "
  ";
        // line 46
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 46, $this->source), "html", null, true);
        echo "

  ";
        // line 48
        $this->displayBlock('content', $context, $blocks);
        // line 51
        echo "</div>

";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("boom/block"), "html", null, true);
        echo "
";
    }

    // line 48
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 49, $this->source), "html", null, true);
        echo "
  ";
    }

    public function getTemplateName()
    {
        return "@boom/block/block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 49,  95 => 48,  89 => 53,  85 => 51,  83 => 48,  78 => 46,  75 => 45,  67 => 43,  65 => 42,  61 => 41,  57 => 40,  54 => 39,  52 => 37,  51 => 36,  50 => 35,  49 => 33,  46 => 31,  42 => 29,  40 => 28,);
    }

    public function getSourceContext()
    {
        return new Source("", "@boom/block/block.twig", "/var/www/html/web/themes/custom/boom/src/components/block/block.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 28, "set" => 29, "block" => 48);
        static $filters = array("merge" => 37, "clean_class" => 35, "escape" => 40);
        static $functions = array("attach_library" => 53);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'block'],
                ['merge', 'clean_class', 'escape'],
                ['attach_library']
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
