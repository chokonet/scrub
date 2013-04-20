<?php

/* navigation.html */
class __TwigTemplate_3dd4872aee202d36bfb3657909b026eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "

\t<li>";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["post_title"]) ? $context["post_title"] : null), "html", null, true);
        echo "</li>";
    }

    public function getTemplateName()
    {
        return "navigation.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
