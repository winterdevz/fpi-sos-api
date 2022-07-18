import{o as i,c as l,a as p,u as f,w as h,F as m,H as y,b as t,d as n,v as g,i as d,e as v,f as c,g as r,r as w,t as u}from"./app.847e1edc.js";import{_}from"./Authenticated.6994a690.js";import"./ApplicationLogo.8c414e09.js";import"./plugin-vue_export-helper.21dcd24c.js";const C=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Contacts ",-1),k={class:"py-12"},D={class:"max-w-3xl mx-auto sm:px-6 lg:px-8"},E={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},$={class:"p-6 bg-white border-b border-gray-200"},S={class:"w-full max-w-lg"},V={class:"flex flex-wrap"},A={class:"w-full md:w-1/2 px-2 mb-6 md:mb-0"},N=t("label",{class:"block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2",for:"grid-first-name"}," Contact Name ",-1),B={class:"w-full md:w-1/2 px-4 mb-6 md:mb-0"},I=t("label",{class:"block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2",for:"grid-last-name"}," Contact Phone ",-1),M={class:"w-full md:w-1/2 px-3 mb-6 md:mb-0"},U=t("label",{class:"block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2",for:"grid-state"}," Visible Status ",-1),H={class:"relative"},L=t("option",{value:"1"},"Active",-1),F=t("option",{value:"0"},"Deactive",-1),j=[L,F],z=t("div",{class:"pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"},[t("svg",{class:"fill-current h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},[t("path",{d:"M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"})])],-1),O={class:"min-w-full"},P=t("thead",{class:"border-b"},[t("tr",null,[t("th",{scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},"#"),t("th",{scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},"Name"),t("th",{scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},"Contact"),t("th",{scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},"Edit"),t("th",{scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},"Delete")])],-1),R={scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},T={scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},q={scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},G={scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},J=["onClick"],K={scope:"col",class:"text-sm font-medium text-gray-900 px-6 py-4 text-left"},Q=["onClick"],W={data(){return{name:"Habeeb",phone:"",status:"",contacts:[],isEdit:!0,contactId:null}},methods:{getData:async function(){const o=await axios.get("/api/contacts");this.contacts=o.data.data},saveContact:async function(){let o={name:this.name,contact:this.phone,isActive:this.status};axios.post("/api/contact",o),this.getData()},editContact:function(o){this.name=o.name,this.phone=o.contact,this.status=o.isActive,this.isEdit=!1,this.contactId=o.id},deleteContact:function(o){axios.delete(`/api/contact/${o}/delete`),this.getData()},newContact:function(){this.name=null,this.phone=null,this.status=null,this.isEdit=!0,this.contactId=null},updateContact:function(o){let e={name:this.name,contact:this.phone,isActive:this.status};axios.patch(`/api/contact/update/${this.contactId}`,e),this.getData()}},mounted(){this.getData()}},et=Object.assign(W,{__name:"Contact",setup(o){return(e,a)=>(i(),l(m,null,[p(f(y),{title:"Dashboard"}),p(_,null,{header:h(()=>[C]),default:h(()=>[t("div",k,[t("div",D,[t("div",E,[t("div",$,[t("form",S,[t("div",V,[t("div",A,[N,n(t("input",{class:"appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white",id:"grid-first-name",type:"text",placeholder:"Security","onUpdate:modelValue":a[0]||(a[0]=s=>d(name)?name.value=s:null)},null,512),[[g,e.name]])]),t("div",B,[I,n(t("input",{class:"appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500",id:"grid-last-name",type:"text",placeholder:"2348128282929","onUpdate:modelValue":a[1]||(a[1]=s=>d(phone)?phone.value=s:null)},null,512),[[g,e.phone]])]),t("div",M,[U,t("div",H,[n(t("select",{class:"block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500",id:"grid-state","onUpdate:modelValue":a[2]||(a[2]=s=>d(status)?status.value=s:null)},j,512),[[v,e.status]]),z]),n(t("button",{onClick:a[3]||(a[3]=r(s=>e.saveContact(),["prevent"])),class:"bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2"},"Save",512),[[c,e.isEdit]]),n(t("button",{onClick:a[4]||(a[4]=r(s=>e.updateContact(),["prevent"])),class:"bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-2"},"Update",512),[[c,!e.isEdit]]),n(t("button",{onClick:a[5]||(a[5]=r(s=>e.newContact(),["prevent"]))},"Add New Contact",512),[[c,!e.isEdit]])])])])])])]),t("table",O,[P,(i(!0),l(m,null,w(e.contacts,(s,x)=>(i(),l("tr",{key:s.id},[t("td",R,u(x+1),1),t("td",T,u(s.name),1),t("td",q,u(s.contact),1),t("td",G,[t("button",{type:"button",class:"inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out",onClick:b=>e.editContact(s)},"Edit",8,J)]),t("td",K,[t("button",{class:"inline-block px-6 py-2.5 bg-orange-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-orange-700 hover:shadow-lg focus:bg-orange-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-orange-800 active:shadow-lg transition duration-150 ease-in-out",onClick:b=>e.deleteContact(s.id)},"Delete",8,Q)])]))),128))])])]),_:1})],64))}});export{et as default};
