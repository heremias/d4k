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

/* @bootstrap_storybook/alert/alert.twig */
class __TwigTemplate_50a3cae116f1838ba39122e4ecf563d6caddc3a789acc23814e7dbf68bef4ba3 extends \Twig\Template
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
        // line 13
        $context["dismissible"] = (($context["dismissible"]) ?? (true));
        // line 14
        $context["classes"] = twig_array_merge([0 => "alert", 1 => ((        // line 16
($context["type"] ?? null)) ? (("alert-" . $this->sandbox->ensureToStringAllowed(($context["type"] ?? null), 16, $this->source))) : ("")), 2 => ((        // line 17
($context["dismissible"] ?? null)) ? ("alert-dismissible") : (""))], ((        // line 18
($context["utility_classes"] ?? null)) ? (($context["utility_classes"] ?? null)) : ([])));
        // line 19
        echo "
<div class=\"";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(($context["classes"] ?? null), 20, $this->source), " "), "html", null, true);
        echo "\" role=\"alert\">
  ";
        // line 21
        if (($context["heading"] ?? null)) {
            // line 22
            echo "    <h4 class=\"alert-heading\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["heading"] ?? null), 22, $this->source), "html", null, true);
            echo "</h4>
  ";
        }
        // line 24
        echo "
  ";
        // line 25
        $this->displayBlock('content', $context, $blocks);
        // line 28
        echo "
  ";
        // line 29
        if (($context["dismissible"] ?? null)) {
            // line 30
            echo "    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&times;</span>
    </button>
  ";
        }
        // line 34
        echo "</div>
";
    }

    // line 25
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 26, $this->source), "html", null, true);
        echo "
  ";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/alert/alert.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 26,  83 => 25,  78 => 34,  72 => 30,  70 => 29,  67 => 28,  65 => 25,  62 => 24,  56 => 22,  54 => 21,  50 => 20,  47 => 19,  45 => 18,  44 => 17,  43 => 16,  42 => 14,  40 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/alert/alert.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/alert/alert.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 13, "if" => 21, "block" => 25);
        static $filters = array("merge" => 18, "escape" => 20, "join" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['merge', 'escape', 'join'],
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
