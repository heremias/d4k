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

/* @bootstrap_storybook/button/button.twig */
class __TwigTemplate_3946c64ff8330e85b99787e61481cb0164149fd55715429cba4c1f4a00e82d77 extends \Twig\Template
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
        // line 14
        $context["tag"] = (($context["tag"]) ?? ("button"));
        // line 15
        echo "
";
        // line 16
        $context["button_classes"] = twig_array_merge([0 => "btn", 1 => ((        // line 18
($context["type"] ?? null)) ? (("btn-" . $this->sandbox->ensureToStringAllowed(($context["type"] ?? null), 18, $this->source))) : (""))], ((        // line 19
($context["button_utility_classes"] ?? null)) ? (($context["button_utility_classes"] ?? null)) : ([])));
        // line 20
        echo "
";
        // line 21
        if ((($context["tag"] ?? null) == "input")) {
            // line 22
            echo "  <input";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["button_classes"] ?? null)], "method", false, false, true, 22), 22, $this->source), "html", null, true);
            echo " />

";
        } elseif ((        // line 24
($context["tag"] ?? null) == "button")) {
            // line 25
            echo "  <button";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["button_classes"] ?? null)], "method", false, false, true, 25), 25, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["value"] ?? null), 25, $this->source), "html", null, true);
            echo "</button>

";
        } else {
            // line 28
            echo "  <";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["tag"] ?? null), 28, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["button_classes"] ?? null)], "method", false, false, true, 28), 28, $this->source), "html", null, true);
            echo " ";
            ((($context["link"] ?? null)) ? (print ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ("href=" . ($context["link"] ?? null)), "html", null, true))) : (print ("")));
            echo " ";
            ((($context["target"] ?? null)) ? (print ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ("target=" . ($context["target"] ?? null)), "html", null, true))) : (print ("")));
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["value"] ?? null), 28, $this->source), "html", null, true);
            echo "</";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["tag"] ?? null), 28, $this->source), "html", null, true);
            echo ">
";
        }
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/button/button.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 28,  61 => 25,  59 => 24,  53 => 22,  51 => 21,  48 => 20,  46 => 19,  45 => 18,  44 => 16,  41 => 15,  39 => 14,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/button/button.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/button/button.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 14, "if" => 21);
        static $filters = array("merge" => 19, "escape" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['merge', 'escape'],
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
