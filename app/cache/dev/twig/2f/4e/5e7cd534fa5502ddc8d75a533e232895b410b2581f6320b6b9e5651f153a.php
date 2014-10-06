<?php

/* pizzaPizzaBundle:Default:index.html.twig */
class __TwigTemplate_2f4e5e7cd534fa5502ddc8d75a533e232895b410b2581f6320b6b9e5651f153a extends Twig_Template
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
        echo "<head>
</head
<body>
Hello ";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
        echo "!
</body>
";
    }

    public function getTemplateName()
    {
        return "pizzaPizzaBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  19 => 1,);
    }
}
